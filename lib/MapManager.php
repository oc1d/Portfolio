<?php
require_once('lib/Map.php');
require_once('config/GlobalConfig.php');

class MapManager {

    private $db;

    /**
     *
     * @param DataBase $db
     * @return unknown_type
     */
    public function __construct(DataBase &$db) {
        $this->db = &$db;
    }

    /**
     *
     * @return unknown_type
     */
    public function extendMap() {
        $mapBlockEntryManager = new MapBlockEntryManager($this->db);
        $entry = $mapBlockEntryManager->getLastMapBlockEntry();
        $mapBlockClass = false;
        $mapBlock = false;
        if($entry === false) {
            $mapBlockClass = GlobalConfig::MAP_BLOCK_START_CLASS;
            $mapBlock = MapBlock::GetMapBlock($mapBlockClass, 0, 0);
        }
        else {
            $mapBlock = MapBlock::GetMapBlock($entry->mapblockclass, $entry->fromX, $entry->fromY);
            $mapConnection = $mapBlock->getRandomConnection();
            
            $oldPosition = new Position($entry->fromX, $entry->fromY);           
            $newMapBlock = MapBlock::GetMapBlock($mapConnection->class);
            $newPosition = $newMapBlock->getNextStartPosition($oldPosition, $mapConnection->direction);

            $newMapBlock->startPosX = $newPosition->x;
            $newMapBlock->startPosY = $newPosition->y;                       
            $mapBlock = $newMapBlock;
            $mapBlockClass = $mapConnection->class;
        }
        
        $map = new Map();
        $mapBlock->setMapElements($map);
        $elements = $map->getAllElements();
        foreach ($elements as $el) {
            $map->setPosition($el->xPos, $el->yPos);
            $this->setMapPlacesFromDirectionElement($el->northElement, Map::NORTH, $mapBlockClass, $map);
            $this->setMapPlacesFromDirectionElement($el->eastElement,  Map::EAST,  $mapBlockClass, $map);
            $this->setMapPlacesFromDirectionElement($el->southElement, Map::SOUTH, $mapBlockClass, $map);
            $this->setMapPlacesFromDirectionElement($el->westElement,  Map::WEST,  $mapBlockClass, $map);
        }
        $newMapBlockEntry = new MapBlockEntry();
        $newMapBlockEntry->fromX = $mapBlock->startPosX;
        $newMapBlockEntry->fromY = $mapBlock->startPosY;
        $newMapBlockEntry->toX = $mapBlock->startPosX + $mapBlock->width;
        $newMapBlockEntry->toY = $mapBlock->startPosY + $mapBlock->height;
        $newMapBlockEntry->mapblockclass = 	$mapBlockClass;
        $mapBlockEntryManager->insertMapBlockEntry($newMapBlockEntry);
    }

    /**
     *
     * @param unknown_type $directionElement
     * @param unknown_type $direction
     * @return unknown_type
     */
    private function setMapPlacesFromDirectionElement(&$directionElement, $direction, $mapBlockClass, &$map) {
        $mapImage = MapImage::GetMapImageFromClass($directionElement->mapImageClassKey,$mapBlockClass);
        if(!$mapImage) {
            echo "could not load mapimage";
            die();
        }
        $map->setDirection($direction);
        
        if($directionElement->isSpawnPoint) {
            $spawnPoint = new MapSpawnPoint();
            $spawnPoint->x = $map->getPosX();
            $spawnPoint->y = $map->getPosY();
            $spawnPoint->direction = $direction;
            $spMan = new MapSpawnPointManager($this->db);
            try {
                $spMan->insertSpawnPoint($spawnPoint);
            }
            catch (Exception $e) {
                //
            }
        }
         
        foreach ($mapImage->mapImageProperties as &$property) {   
        	        
            $absolutePosition = $map->getAbsolutePosition($property->relativePosX,$property->relativePosY);
            $newX = $absolutePosition->x;
            $newY = $absolutePosition->y;
            $newD = $map->getAbsoluteDirection($property->relativeDirection);
            
            //if($newX > 4 || $newY > 4){ 
            // echo $directionElement->mapImageClassKey . ' generates '. $newX . ' ' . $newY .' at ' . $map->getPosX() . ' # ' . $map->getPosY();
            // echo "<br />";
            // var_dump($property);
            // echo "<br />" . $direction;             
            // die();
            //}
            // property in Datenbank schreiben.
            
            //if( ($newX == 1 && $newY == 0 && $newD == 1)||($newX == 1 && $newY == 4 && $newD == 3) ) {
            //	var_dump($mapImage);
            //		die();            	
            //}
            $mapPlace = new MapPlace();
            $mapPlace->direction = $newD;
            $mapPlace->x = $newX;
            $mapPlace->y = $newY;
            $mapPlaceMan = new MapPlaceManager($this->db);
            try {
                $mapPlaceMan->insertMapPlace($mapPlace);
            } catch (Exception $e) {
                // nothing;
            }
        }
    }
}