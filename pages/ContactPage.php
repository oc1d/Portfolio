<?php
require_once('lib/DefaultPage.php');

class ContactPage extends DefaultPage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));      
        $this->title = 'Contact';
        $this->setContentTemplate('Contact.tpl.html');
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){        
        $this->display();
    }
}
?>