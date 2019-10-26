<?php 
require_once('config/GlobalConfig.php');
require_once('Template.php');
require_once('DataBase.php');
require_once('MailManager.php');

/**
 * the Default Page
 * @author Administrator
 *
 */
class DefaultPage
{	
	/**
	 * Title of the page
	 * @var unknown_type
	 */
	public $title;
	public $pageTemplate = 'html.tpl.html';
	public $contentTemplate;
	protected $db;	
	protected $template;
	
	/**
	 * Constructor of DefaultPage
	 * @return unknown_type
	 */
	public function __construct() {
		$this->template = new Template();
		$this->startSession();		
		$this->title = "untitled";	
		$this->template->assign('basePath', GlobalConfig::BASE_PATH);			
	}	

	/**
	 * 
	 * @return unknown_type
	 */
	public function startSession() {
	    session_start();
	}
	
   /**
     * 
     * @return unknown_type
     */
    public function destroySession() {        
        session_destroy();           
        session_start();        
        session_regenerate_id();     
        $this->redirect('./');
    }
	
	/**
	 * Sets the ContentTemplate used
	 * @return unknown_type
	 */
	public function setContentTemplate($template){		
		$this->contentTemplate = $template;
	}

    /**
     * 
     * @param unknown_type $paramName
     * @return unknown_type
     */
    public function getParam($paramName) {
        if(isset($_GET[$paramName])) {
            return $_GET[$paramName];
        }
        else if(isset($_POST[$paramName])) {
            return $_POST[$paramName];
        } 
        return false;
    }

    /**
     * redirect
     * @param $url
     * @return unknown_type
     */
    protected function redirect($url) {
        header("Location: $url");
    }
    
	/**
	 * Displays page
	 * @return void
	 */
	public function display() {		
	    if(isset($_SESSION['userName']))$this->template->assign('userName', $_SESSION['userName']);		
		$this->template->assignRef('title', $this->title);		
		$this->template->assignRef('contentTemplate', $this->contentTemplate);	        	
		$this->template->display($this->pageTemplate);		
	}
}

?>