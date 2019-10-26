<?php 
require_once('DefaultPage.php');
require_once('DataBase.php');
require_once('UserManager.php');
require_once('User.php');

/**
 * the Default Page
 * @author Administrator
 *
 */
class DataBasePage extends DefaultPage
{	
	/**
	 * Title of the page
	 * @var unknown_type
	 */
	protected $db;	
	protected $userManager;
	
	/**
	 * Constructor of DefaultPage
	 * @return unknown_type
	 */
	public function __construct() {
		parent::__construct();	
		include('config/config.db.php');		
		$this->db = new DataBase($server, $user, $password, $database);	 	
		$this->userManager = new UserManager($this->db);
	}	
	
}

?>