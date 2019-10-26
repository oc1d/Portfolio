<?php
require_once('lib/DataBasePage.php');

class ResetPasswordPage extends DataBasePage {

    private $email;
    private $userid;

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));
        $this->title = 'Passwort zurücksetzten';
        $this->setContentTemplate('ResetPassword.tpl.html');
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction() {
        $key = $this->getParam('key');
        $userid = $this->getUserIdFromKey($key);        
        if(!$userid) {
            $this->template->assign('keyInvalid', true);
            $this->display();
            die();
        }
        $user = $this->userManager->getUserById($userid);
        $this->template->assign('user',$user);
        $this->template->assign('key',$key);
        if($this->getParam('confirmed')) {
            $passwordOne = $this->getParam('passwordOne');
            $passwordTwo = $this->getParam('passwordTwo');
            if($passwordOne != $passwordTwo) {
                $this->template->assign('passwordMissmatch', true);
                $this->display();
                die();
            } else {
                $user->password = sha1($passwordTwo);
                $this->userManager->saveUser($user);
                $this->deleteKey($key);
                $this->redirect('./?page=Login&passwordResetSuccessfull=true');
            }
        }
        $this->display();
    }


    /**
     *
     * @param $code
     * @return unknown_type
     */
    private function deleteKey($key) {
        $sql = "DELETE FROM `userpasswordforget` WHERE `key` = " . $this->db->escapeText($key);
        $result = $this->db->query($sql);
    }

    /**
     *
     * @param unknown_type $code
     * @return unknown_type
     */
    private function getUserIdFromKey($key) {
        $sql = "SELECT `userId` FROM `userpasswordforget` WHERE `key` = " . $this->db->escapeText($key);
        $result = $this->db->query($sql);
        if($row = $this->db->fetchArray($result)) {
            return $row['userId'];
        }
        return false;
    }
}

?>