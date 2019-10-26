<?php
require_once('lib/DataBasePage.php');

class ForgetPasswordPage extends DataBasePage {

    private $email;
    private $userid;

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));
        $this->title = 'Passwort vergessen';
        $this->setContentTemplate('ForgetPassword.tpl.html');
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){
        $this->display();
    }

    /**
     *
     * @return unknown_type
     */
    public function sendMailAction(){
        $this->email = $this->getParam('email');
        if(!$this->userManager->EmailAddressValid($this->email)) {
            $this->template->assign('emailInvalid', true);
            $this->display();
            die();
        }
        $this->userid = $this->userManager->getUserId($this->email);
        if(!$this->userid) {
            $this->template->assign('noUserForEmail', true);
            $this->display();
            die();
        }
        $code = $this->getFreeCode();
        $this->insertCode($code);

        $link = GlobalConfig::BASE_PATH . '?page=ResetPassword&key='.$code;
        $body = file_get_contents('templates/passwordforgetemail.tpl.txt');
        $body = str_replace('%LINK%', $link, $body);
        $subject = "Portfolio | Passwort zurücksetzten";
        $mailSuccess = MailManager::SendEmail($this->email,$subject,$body);
        $this->template->assign('mailSuccess', $mailSuccess);
        $this->display();
    }

    /**
     *
     * @return unknown_type
     */
    private function generateCode() {
        $chars = "abcdefghijklmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $no = "";
        while ($i < 16) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $no .= $tmp;
            $i++;
        }
        return $no;
    }

    /**
     *
     * @return unknown_type
     */
    private function getFreeCode() {
        $code = $this->generateCode();
        while( !$this->checkCode($code)) {
            $code = $this->generateCode();
        }
        return $code;
    }

    /**
     *
     * @param $code
     * @return unknown_type
     */
    private function insertCode($code) {
        $sql = "DELETE FROM `userpasswordforget` WHERE `userId` = " . $this->db->escapeText($this->userid);
        $result = $this->db->query($sql);

        $values = array();
        $values['userId'] = $this->db->escapeText($this->userid);
        $values['key'] = $this->db->escapeText($code);
        $sql = $this->db->generateInsert('userpasswordforget', $values);
        $result = $this->db->query($sql);
    }

    /**
     *
     * @param unknown_type $code
     * @return unknown_type
     */
    private function checkCode($code) {
        $sql = "SELECT * FROM `userpasswordforget` WHERE `key` = " . $this->db->escapeText($code);
        $result = $this->db->query($sql);
        if($row = $this->db->fetchArray($result)) {
            return false;
        }
        return true;
    }
}

?>