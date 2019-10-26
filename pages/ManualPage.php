<?php
require_once('lib/DefaultPage.php');

class ManualPage extends DefaultPage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));      
        $this->title = 'Manual';
        $this->setContentTemplate('Manual.tpl.html');
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