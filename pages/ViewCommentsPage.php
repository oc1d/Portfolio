<?php
require_once('lib/DataBasePage.php');
require_once('lib/UserComment.php');

class ViewCommentsPage extends DataBasePage {
	
	public function __construct() {
		parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));              
        $this->setContentTemplate('ViewComments.tpl.html');
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function indexAction() {
        $ownerUserId = $this->getParam('ownerUserId');
        $userManager = new UserManager($this->db);
        $user = $userManager->getUserById($ownerUserId);        
        $this->title = 'Kommentare zu ' . $user->name;
        $comment = new UserComment($this->db);
        $comments = $comment->getComments($ownerUserId);        
        $this->template->assignRef('ownerUser', $user);		
        $this->template->assignRef('comments', $comments);        
        $this->template->assignRef('user', $this->userManager->checkLoginAndGetUser(session_id()));        
		$this->display();
	}	
	
   /**
     * 
     * @return unknown_type
     */
    public function deleteCommentAction() {
        $commentId = $this->getParam('commentId');        
        $userManager = new UserManager($this->db);        
        $user = $this->userManager->checkLoginAndGetUser(session_id());              
        $comment = new UserComment($this->db);        
        $comment = $comment->getById($commentId);
        $comment->setDb($this->db);
                  
        if($comment->commentUserId == $user->id || $comment->userId == $user->id) {
        	$comment->deleteComment();
        }   
        //$this->redirect('./?page=ViewComments&ownerUserId=' . $comment->userId);
        $this->redirect('./?page=Galery');
    }
}