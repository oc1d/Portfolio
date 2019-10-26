<?php
require_once('lib/DataBasePage.php');
require_once('lib/Map.php');
require_once('lib/MapImage.php');
require_once('config/GlobalConfig.php');
require_once('lib/UserComment.php');


class GaleryPage extends DataBasePage {

    private $map;
    private $mapBlockEntryTmpId;

    private $oldX;
    private $oldY;
    private $oldDirection;
    private $showMap;
    private $opacity;
    private $opacityValue;

    /**
     * Konstruktor
     * @return unknown_type
     */
    public function __construct(){
        parent::__construct();
        $this->template->assign('page', substr(__CLASS__, 0, -4));
        $this->title = 'Galerie';
        $this->setContentTemplate('Galery.tpl.html');
        $this->map = new Map($this->db);
        $point = false;
        if (isset($_SESSION['showMap'])) {
            $this->showMap = $_SESSION['showMap'];
            $this->template->assign('session', true);
        }
        else {
        	
            $this->showMap = true;
        }
        if (isset($_SESSION['opacity'])) {
            $this->opacity = $_SESSION['opacity'];
        }
        else {
            $this->opacity = false;
        }
        if (isset($_SESSION['opacityValue'])) {
            $this->opacityValue = $_SESSION['opacityValue'];
        }
        else {
            $this->opacityValue = GlobalConfig::OPACITY_VALUE;
        }
        if (isset($_SESSION['posX'])) {
            $this->oldX = $_SESSION['posX'];
            $this->oldY = $_SESSION['posY'];
            $this->map->setPosition($_SESSION['posX'], $_SESSION['posY']);
        }
        else {
            $spMan = new MapSpawnPointManager($this->db);
            $point = $spMan->getRandomSpawnPoint();
            $this->map->setPosition($point->x, $point->y);
        }
        if (isset($_SESSION['direction'])) {
            $this->oldDirection = $_SESSION['direction'];
            $this->map->setDirection($_SESSION['direction']);
        }
        else {
            $this->map->setDirection($point->direction);
        }
        $mapBlockEntryManager = new MapBlockEntryManager($this->db);
        $mapBlockEntry = $mapBlockEntryManager->getMapBlockEntry($this->map->getPosX(), $this->map->getPosY());
        $this->template->assign('blockId', $mapBlockEntry->id);
        $this->map->buildMap($mapBlockEntry);
    }

    /**
     *
     * @return unknown_type
     */
    public function indexAction(){
        $this->configureAndDisplay();
    }

    /**
     *
     * @return unknown_type
     */
    public function goToUserAction() {
        require_once('lib/MapPlaceManager.php');
        require_once('lib/MapPlace.php');
        $userId = $this->getParam('userId');
        $mapPlaceManager = new MapPlaceManager($this->db);
        $mapPlace = $mapPlaceManager->loadUserMapPlace($userId);
        if($mapPlace) {
            $_SESSION['posX'] = $mapPlace->x;
            $_SESSION['posY'] = $mapPlace->y;
            $_SESSION['direction'] = $mapPlace->direction;
        }
        $this->redirect('./?page=Galery');
    }


    private function configureAndDisplay() {
        $this->setSessionParams();
        $x = $this->map->getPosX();
        $y = $this->map->getPosY();
        $d = $this->map->getDirection();

        // nächster Block wird betreten
        $mapDirectionElement = $this->map->getActualMapDirectionElement($d);
        if(!$mapDirectionElement) {
            $mapBlockEntryManager = new MapBlockEntryManager($this->db);
            $mapBlockEntry = $mapBlockEntryManager->getMapBlockEntry($x, $y);
            if(!$mapBlockEntry){
                $this->template->assign('mapEnd', true);
                $this->map->setPosition($this->oldX, $this->oldY);
                $this->map->setDirection($this->oldDirection);
                $this->setSessionParams();
            }
            else {
                $this->map->buildMap($mapBlockEntry);
            }
            $mapDirectionElement = $this->map->getActualMapDirectionElement($d);
            $this->template->assign('blockId', $mapBlockEntry->id);
        }
        $mapImageClassKey = $mapDirectionElement->mapImageClassKey;
        if( $mapImageClassKey ) {
   	        $mapImage = MapImage::GetMapImageFromClass($mapImageClassKey, $this->map->mapBlockClass);
   	        foreach ($mapImage->mapImageProperties as &$property) {
   	            if($property->isUserPlace) {
   	                $absolutePosition = $this->map->getAbsolutePosition($property->relativePosX,$property->relativePosY);
   	                $newX = $absolutePosition->x;
   	                $newY = $absolutePosition->y;
   	                $newD = $this->map->getAbsoluteDirection($property->relativeDirection);
   	                $propertyUser = $this->userManager->getMapUser($newX, $newY,  $newD);
   	                $property->user = $propertyUser;
   	                $property->loadVisualStyleInfo();
   	                 
   	                if ($propertyUser->allowsComments && $property->relativePosX == '0' && $property->relativePosY == '0' && $property->relativeDirection == Map::NORTH) {
   	                    $userComment = new UserComment($this->db);
   	                    $comment = $userComment->getLastComment($propertyUser->id);
   	                    if(strlen($comment->text) > 60) {
   	                        $comment->text = substr($comment->text,0, 60) . ' ...';
   	                    }
   	                    $this->template->assignRef('comment',$comment);
   	                    $this->template->assign('commentsAllowed',$propertyUser->allowsComments);
   	                    $this->template->assign('userInFront', true);
   	                }
   	            }
   	        }
   	        $this->template->assign('mapImage', $mapImage);
   	        $this->template->assign('mapBlockClass', $this->map->mapBlockClass);
        }
        $this->template->assign('mapPointLeftMargin', ($this->map->mapBlock->getActualMapPosX($x) * 40) + 17 );
        $this->template->assign('mapPointTopMargin', ($this->map->mapBlock->getActualMapPosY($y) * 40) + 17 );
        $this->template->assign('direction', $d);
        $this->template->assign('directionElement', $mapDirectionElement);
        $this->template->assign('posX', $x);
        $this->template->assign('posY', $y);
        $this->template->assign('opacity', $this->opacity);
        $this->template->assign('opacityVal', $this->opacityValue);
        $this->template->assign('showMap', $this->showMap);
        $this->template->assignRef('user', $this->userManager->checkLoginAndGetUser(session_id()));
        $this->display();
    }

    private function setSessionParams()  {
        $_SESSION['posX'] = $this->map->getPosX();
        $_SESSION['posY'] = $this->map->getPosY();
        $_SESSION['direction'] = $this->map->getDirection();
        $_SESSION['showMap'] = $this->showMap;
        $_SESSION['opacity'] = $this->opacity;
        $_SESSION['opacityValue'] = $this->opacityValue;
    }

    public function goForwardAction() {
        if(!$this->map->goForward()) {
            $this->template->assign('wall', true);
        }
        $this->configureAndDisplay();
    }

    public function goBackwardAction() {
        if(!$this->map->goBackward()) {
            $this->template->assign('wall', true);
        }
        $this->configureAndDisplay();
    }

    public function goLeftAction() {
        if(!$this->map->goLeft()) {
            $this->template->assign('wall', true);
        }
        $this->configureAndDisplay();
    }

    public function goRightAction() {
        if(!$this->map->goRight()) {
            $this->template->assign('wall', true);
        }
        $this->configureAndDisplay();
    }

    public function turnLeftAction() {
        $this->map->turnLeft();
        $this->configureAndDisplay();
    }

    public function turnRightAction() {
        $this->map->turnRight();
        $this->configureAndDisplay();
    }

    /**
     *
     * @return unknown_type
     */
    public function disableMapAction() {
        $this->showMap = false;
        $this->configureAndDisplay();
    }

    /**
     *
     * @return unknown_type
     */
    public function enableMapAction() {
        $this->showMap = true;
        $this->configureAndDisplay();
    }
    
    /**
     *
     * @return unknown_type
     */
    public function disableOpacityAction() {
        $this->opacity = false;
        $this->configureAndDisplay();
    }

    /**
     *
     * @return unknown_type
     */
    public function enableOpacityAction() {
        $this->opacity = true;
        $this->configureAndDisplay();
    }  
    
        /**
     *
     * @return unknown_type
     */
    public function setOpacityValueAction() {
        $this->opacityValue = $this->getParam('opacityValue');
        $this->configureAndDisplay();
    } 
    
}

?>