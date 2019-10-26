<?php
require_once('lib/DataBasePage.php');

class LoginPage extends DataBasePage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));      
        $this->title = 'Login';
        $this->setContentTemplate('Login.tpl.html');
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){
        $this->template->assign('registerSuccess', $this->getParam('registerSuccess'));
        $this->template->assign('passwordResetSuccessfull', $this->getParam('passwordResetSuccessfull'));
        $this->template->assign('notLoggedIn', $this->getParam('notLoggedIn'));
        $this->display();
    }

    /**
     *
     * @return unknown_type
     */
    public function loginAction(){
        $email = $this->getParam('email');
        $password = $this->getParam('password');

        $userManager = new UserManager($this->db);
        try {
            $user = $userManager->getUser($email, $password);
            if($user) {
                $userManager->saveLogin($user, session_id());
                $_SESSION['useremail'] = $email;                
                $this->redirect('./?page=UserHome');
            }
        } catch(Exception $e) {
            $this->template->assign('loginIncorrect', true);
            $this->template->assign('errorMessage', $e->getMessage());
        }
        $this->display();
    }
}

?>