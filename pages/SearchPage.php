<?php
require_once('lib/DataBasePage.php');

class SearchPage extends DataBasePage {

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));      
        $this->title = 'Suche';
        $this->setContentTemplate('Search.tpl.html');
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){   
    	$searchphrase = $this->getParam('searchphrase');
    	$results = $this->userManager->searchUsers($searchphrase);
    	$this->template->assignRef('users', $results);
    	$this->template->assign('resultCount', count($results));
        $this->display();
    }
}
?>