<?php
require_once('lib/SecurePage.php');
require_once('lib/MapPlace.php');
require_once('lib/MapPlaceManager.php');
require_once('lib/MapManager.php');
require_once('lib/UserComment.php');

class UserHomePage extends SecurePage {

	public $imageBasePath = './images/userimages/';
	private $imageresolutions;
	private $mapPlaceManager;

	/**
	 * Konstruktor
	 * @return unknown_type
	 */
	public function __construct(){
		parent::__construct();
		$this->template->assign('page', substr(__CLASS__, 0, -4));
		$this->title = $this->user->name . "'s persönliche Seite";
		$this->setContentTemplate('UserHome.tpl.html');
		include('config/config.imageresolutions.php');
		$this->imageresolutions = $imageresolutions;
		$this->mapPlaceManager = new MapPlaceManager($this->db);
		$this->user->mapPlace = $this->mapPlaceManager->loadUserMapPlace($this->user->id);
		$comment = new UserComment($this->db);
		$comments = $comment->getComments($this->user->id);
		//$this->template->assignRef('ownerUser', $this->user);
		$this->template->assignRef('comments', $comments);		
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function indexAction(){
		$this->template->assign('mapPlacePending', $this->getParam('mapPlacePending'));
		$this->template->assign('mapPlaceSet', $this->getParam('mapPlaceSet'));

		$this->display();
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function setUserPlaceAction(){
		$place = new MapPlace();
		$place->x = $this->getParam('x');
		$place->y = $this->getParam('y');
		$place->direction = $this->getParam('direction');
		$place->userid = $this->user->id;
			
		if(!$this->mapPlaceManager->mapPlaceIsFree($place)) {
			echo "This place is not free! Hacking not allowed! :D";
			die();
		}
		$this->mapPlaceManager->unsetMapPlace($this->user->id);
		$this->mapPlaceManager->updateMapPlace($place);

		$count = $this->mapPlaceManager->getFreeMapPlaceCount();
		if($count < GlobalConfig::MIN_FREE_PLACE_COUNT || GlobalConfig::ALWAYS_EXTEND_MAP ) {
			$mapManager = new MapManager($this->db);
			$mapManager->extendMap();
		}
		$this->redirect('./?page=Galery');
	}

	/**

	*/
	private function sendUpdateEmail() {

		$userid = $this->user->id;
		if($userid) {
			$link = GlobalConfig::BASE_PATH . '?page=Galery&action=goToUser&userId='.$userid;
			$body = file_get_contents('templates/newimageemail.tpl.txt');
			$body = str_replace('%LINK%', $link, $body);
			$body = str_replace('%NAME%', $this->user->name, $body);
			$subject = "Portfolio | Ein neues Bild wurde hochgeladen";

			$addresses = $this->userManager->getNewsletterEmailAdresses();
			foreach ($addresses as $address) {
				$mailSuccess = MailManager::SendEmail($address,$subject,$body);
			}
		}
	}


	/**
	 *
	 * @return unknown_type
	 */
	public function setShortDescriptionAction(){
		$this->user->shortDescription = $this->getParam('shortDescription');
		try {
			$this->userManager->saveUser($this->user);
			$this->template->assign('shortDescriptionChangeSuccess', true);
			$this->display();
			die();
		}
		catch (Exception $e){
			$this->template->assign('shortDescriptionChangeError', true);
			$this->display();
			die();
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function setEmailAction(){
		$this->user->email = $this->getParam('email');
		$this->user->newsletter = ( $this->getParam('newsletter') == 'on');
		try {
			$this->userManager->saveUser($this->user);
			$this->template->assign('emailChangeSuccess', true);
			$this->display();
			die();
		}
		catch (Exception $e){
			$this->template->assign('emailChangeError', true);
			$this->display();
			die();
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function setAllowsCommentsAction(){
		$this->user->allowsComments = ( $this->getParam('allowsComments') == 'on');
		try {
			$this->userManager->saveUser($this->user);
			$this->template->assign('commentChangeSuccess', true);
			$this->display();
			die();
		}
		catch (Exception $e){
			$this->template->assign('error', true);
			$this->display();
			die();
		}
	}


	/**
	 *
	 * @return unknown_type
	 */
	public function setNameAction(){
		$this->user->name = $this->getParam('name');
		try {
			$this->userManager->saveUser($this->user);
			$this->template->assign('nameChangeSuccess', true);
			$this->display();
			die();
		}
		catch (Exception $e){
			$this->template->assign('nameChangeError', true);
			$this->display();
			die();
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function setImageAction(){

		$this->deleteOldImages();
		$this->createFolders();
		$imageFile = $_FILES['image'];
		$this->checkImageFilename($imageFile);
		$fileManager = new FileManager($this->db);
		$filename = $fileManager->generateNewImageFilename($this->user);
		$this->user->imageFilename = $filename;
		$uploadSuccess = move_uploaded_file($imageFile['tmp_name'], $this->imageBasePath . $this->user->id . '/'.$filename);
		$this->scaleImage();
		$this->setUserMapPlace();
		if($uploadSuccess) {
			$this->userManager->saveUser($this->user);
			$this->sendUpdateEmail($this->user);
			$this->redirect("./?page=UserHome");
		}
	}

	/**
	 * replace user on map!
	 * @return unknown_type
	 */
	private function setUserMapPlace() {
		$this->mapPlaceManager->unsetMapPlace($this->user->id);

		$count = $this->mapPlaceManager->getFreeMapPlaceCount();
		if($count < 10 || GlobalConfig::ALWAYS_EXTEND_MAP ) {
			$mapManager = new MapManager($this->db);
			$mapManager->extendMap();
		}
			
		$mapPlace = $this->mapPlaceManager->getRandomFreeMapPlace();
		$mapPlace->userid = $this->user->id;
		if(!$mapPlace) {
			return false;
		}
		else {
			$this->mapPlaceManager->updateMapPlace($mapPlace);
			return true;
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function deleteOldImages(){
		$basePath = $this->imageBasePath;
		$dir = $this->imageBasePath . $this->user->id;
		foreach ($this->imageresolutions as $resolution) {
			$reso = explode('x', $resolution);
			$resolutionDir = $dir . '/' . $reso[0] . 'x' . $reso[1] . '/';
			@unlink($resolutionDir . $this->user->imageFilename);
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	private function checkImageFilename($imageFile) {
		$imageExt = strtolower(substr($imageFile['name'], -3));
		if($imageExt != 'jpg') {
			$this->template->assign('wrongImageFormat', true);
			$this->display();
			die();
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	private function createFolders() {
		$basePath = $this->imageBasePath;
		$user = &$this->user;
		$dir = $basePath;
		if(!file_exists($dir)) {
			mkdir($dir);
		}

		$dir = $basePath . $user->id;
		if(!file_exists($dir)) {
			mkdir($dir);
		}

		foreach ($this->imageresolutions as $resolution) {
			$reso = explode('x', $resolution);
			$resolutionDir = $dir . '/' . $reso[0] . 'x' . $reso[1] . '/';
			if(!file_exists($resolutionDir)) {
				mkdir($resolutionDir);
			}
		}
	}

	/**
	 *
	 * @param $user
	 * @return unknown_type
	 */
	private function scaleImage() {
		$imageHandler = new ImageHandler();
		$user = $this->user;
		$basePath = $this->imageBasePath;
		$dir = $basePath . $user->id;
		$srcImage = $dir . '/'. $user->imageFilename;
			
		foreach ($this->imageresolutions as $resolution) {
			$reso = explode('x', $resolution);
			$resolutionDir = $dir . '/' . $reso[0] . 'x' . $reso[1] . '/';
			$imageHandler->scaleImage($srcImage, $resolutionDir . $user->imageFilename,$reso[0],$reso[1]);
		}
		@unlink($srcImage);
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function setWeblinkAction(){
		$this->user->weblink = $this->getParam('weblink');
		try {
			$this->userManager->saveUser($this->user);
			$this->template->assign('linkChangeSuccess', true);
			$this->display();
			die();
		}
		catch (Exception $e){
			$this->template->assign('linkChangeError', true);
			$this->display();
			die();
		}
	}
	
   /**
     *
     * @return unknown_type
     */
    public function deleteAccountAction(){
    	$this->deleteOldImages();
    	$userComment = new UserComment($this->db);
    	$userComment->deleteComments($this->user->id);
    	$this->userManager->deleteUser($this->user->id);    	
    	session_destroy();  
    	$this->redirect("./?page=UserHome");  	
    }
	
}
?>