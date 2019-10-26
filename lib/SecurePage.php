<?php 
require_once('DataBasePage.php');
require_once('lib/ImageHandler.php');
require_once('lib/FileManager.php');

/**
 * the Default Page
 * @author Administrator
 *
 */
class SecurePage extends DataBasePage
{	
	/**
	 * 
	 * @var unknown_type
	 */
	protected $user;
	
	/**
	 * Constructor of DefaultPage
	 * @return unknown_type
	 */
	public function __construct() {
		parent::__construct();				
		$this->user = $this->userManager->checkLoginAndGetUser(session_id());			
		$this->checkLoginStatus();
		$this->template->assignRef('user', $this->user);		
	}
		
	/**
	 * 
	 * @return unknown_type
	 */
	protected function checkLoginStatus() {
		if(!$this->user) $this->redirect('./?page=Login&notLoggedIn=true');	
	}
	
}

?>