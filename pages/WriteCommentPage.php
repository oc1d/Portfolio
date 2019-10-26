<?php
require_once('lib/SecurePage.php');
require_once('lib/UserComment.php');

class WriteCommentPage extends SecurePage {
	
    public function __construct() {
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));              
        $this->setContentTemplate('WriteComment.tpl.html');
    }
    
    /**
     * 
     */
    public function indexAction() {
    	$ownerUserId = $this->getParam('ownerUserId');
        $userManager = new UserManager($this->db);
        $user = $userManager->getUserById($ownerUserId);        
        $this->title = 'Kommentare für ' . $user->name . ' hinterlassen';        
        $this->template->assignRef('ownerUser', $user);     
        $this->display();	
    }    
    
    /**

    */
    private function sendUpdateEmail($userid) {
       
    	$ownerUser = $this->userManager->getUserById($userid);
        if($ownerUser->newsletter && ( $ownerUser->id != $this->user->id)) {
            $link = GlobalConfig::BASE_PATH . '?page=Galery&action=goToUser&userId='.$userid;
            $body = file_get_contents('templates/newcommentemail.tpl.txt');
            $body = str_replace('%LINK%', $link, $body);
            $body = str_replace('%NAME%', $this->user->name, $body);
            $subject = "Portfolio | Neuer Kommentar";
            $mailSuccess = MailManager::SendEmail($ownerUser->email,$subject,$body);            
        }
    }
    
    /**
     * 
     * @return unknown_type
     */
    public function submitCommentAction() {
    	$ownerUserId = $this->getParam('ownerUserId');
    	
    	$userComment = new UserComment($this->db);
    	$userComment->text = $this->getParam('commentText');
    	$userComment->userId = $ownerUserId;
    	$userComment->commentUserId = $this->user->id;  
    	$userComment->insertComment();
    	$this->sendUpdateEmail($ownerUserId);
    	//$this->redirect('./?page=ViewComments&ownerUserId=' .$ownerUserId);    	
    	$this->redirect('./?page=Galery');
    }
}