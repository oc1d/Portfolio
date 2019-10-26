<?php
require_once('lib/DataBasePage.php');

class RegisterPage extends DataBasePage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));
        $this->title = "Registrieren";
        $this->setContentTemplate('Register.tpl.html');
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
    public function createUserAction(){

        $passwordOne = $this->getParam('passwordOne');
        $passwordTwo = $this->getParam('passwordTwo');

        if($passwordOne != $passwordTwo) {
            $this->template->assign('passwordMissmatch', true);
        } else {
            $user = new User();
            $user->name = $this->getParam('username');
            $user->email = $this->getParam('email');
            $user->allowsComments = true;
            if(!$this->userManager->EmailAddressValid($user->email)) {
                $this->template->assign('emailInvalid', true);
                $this->display();
                die();
            }
            $user->newsletter = ($this->getParam('newsletter') == 'on');
            $user->password = sha1($passwordOne);

            $userManager = new UserManager($this->db);
            try {
                $userManager->saveUser($user);                
                $this->redirect('./?page=Login&registerSuccess=true');
            } catch (Exception $e) {
                $this->template->assign('creationError', $e->getMessage());
            }
        }
        $this->display();
    }
}

?>