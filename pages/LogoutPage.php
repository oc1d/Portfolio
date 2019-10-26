<?php
require_once('lib/DefaultPage.php');

class LogoutPage extends DefaultPage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();        
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){        
        $this->destroySession();  
        $this->redirect('./');     
    }
}

?>