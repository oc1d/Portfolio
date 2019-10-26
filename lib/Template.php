<?php 
require_once('lib/smarty/Smarty.class.php');

class Template {
			
	private $smarty;
	
	/**
	 * Initialisiert das Template
	 * @return void
	 */
	public function __construct() {
		$this->checkRights();
		$this->smarty = new Smarty();		
		$this->smarty->compile_check = true;
		$this->smarty->debugging = false;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	private function checkRights() {
		$file = "./templates_c/writetest";
        $handle = fopen($file, 'w');
        if(!$handle) {
			echo "<html><body>";
			echo "<h2><font color=red>ERROR: the folder './templates_c/' is not writeable by the webserveruser!</h2></font>";
			echo "<h3>Please check userrights of your webserver configuration!</h3>";			
			echo "</body></html>";
        	die();
        }
        fclose($handle);
	}
	
	/**
	 * Assign data to template
	 * @param $name the name of the field
	 * @param $value the value
	 * @return unknown_type
	 */
	public function assign($name, $value){
		$this->smarty->assign_by_ref($name, $value);
	}
	
	/**
	 * Assign data to template by reference
	 * @param $name
	 * @param $value
	 * @return unknown_type
	 */
	public function assignRef($name, &$value){
	    $this->smarty->assign_by_ref($name, $value);
	}
	
	/**
	 * Displays the template
	 * @return unknown_type
	 */
	public function display($template){			
		$this->smarty->display($template);
	}
	
}



?>