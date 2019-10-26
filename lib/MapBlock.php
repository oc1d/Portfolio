<?php
abstract class MapBlock {

    public $startPosX;
    public $startPosY;

    public $width;
    public $height;

    public $blockName;
    public $overViewImage;

    private $connections;

    /**
     *
     * @return unknown_type
     *
    public function __construct($startPosX, $startPosY, $width, $height, $blockName) {
        $this->startPosX = $startPosX;
        $this->startPosY = $startPosY;
        $this->width = $width;
        $this->height = $height;
        $this->blockName = $blockName;
        $this->connections = array();
    }  
    */
    
    /**
     * 
     * @return unknown_type
     */
    public function __construct() {
        
    }

    protected function setHeight ($height) {
        $this->height = $height;
    }
    
    protected function setWidth ($width) {
        $this->width = $width;    
    }
    
    protected function setStartPosX($x) {
        $this->startPosX = $x;    
    }
    
    protected function setBlockName($name) {
        $this->blockName = $name;    
    }
    
    protected function setStartPosy($y) {
        $this->startPosY = $y;   
    }
    
    /**
     *
     * @param unknown_type $direction
     * @param unknown_type $class
     * @return unknown_type
     */
    public function addConnection(MapConnection $connection) {
        $this->connections[] = $connection;
    }

    /**
     *
     * @param unknown_type $class
     * @return unknown_type
     */
    static function GetMapBlock($class, $fromX = false, $fromY = false) {
        $className = 'MapBlock' . $class;
        require_once('mapblockdata/'. $class. '/' . $className. '.php');
        $mapBlock = new $className($fromX,$fromY);
        return $mapBlock;
    }   
    
    /**
     * 
     * @param $absoluteX
     * @return unknown_type
     */
    public function getActualMapPosX($absoluteX) {
    	if($this->startPosX >= 0) {
    		return $absoluteX - $this->startPosX;
    	}
    	else {
    		return abs($this->startPosX) + $absoluteX;  
    	}        
    }
    
    /**
     * 
     * @param $absoluteX
     * @return unknown_type
     */
    public function getActualMapPosY($absoluteY) {
        if($this->startPosY >= 0) {
            return $absoluteY - $this->startPosY;
        }
        else {
            return abs($this->startPosY) + $absoluteY;  
        }  
    }
        
    
    /**
     *
     * @return unknown_type
     */
    public function getRandomConnection() {
        // get random entry
        $connectionCount = count($this->connections);
        $numbers = range(0, $connectionCount - 1);
        shuffle($numbers);
        $connection = $this->connections[$numbers[0]];
        return $connection;
    }

    /**
     * returns all map elements given with this maplock
     * @return array of mapElements
     */
    abstract public function setMapElements(Map &$map);

    /**
     * returns new StartPosition
     * @return unknown_type
     */
    public function getNextStartPosition(Position $oldStartPosition, $direction) {
        $nextStartPosition = new Position();
        
        switch($direction) {
            case Map::NORTH :
                $nextStartPosition->x = $oldStartPosition->x;
                $nextStartPosition->y = $oldStartPosition->y - $this->height;
                break;
            case Map::EAST :
                $nextStartPosition->x = $oldStartPosition->x + $this->width;
                $nextStartPosition->y = $oldStartPosition->y;
                break;
            case Map::SOUTH :
                $nextStartPosition->x = $oldStartPosition->x;
                $nextStartPosition->y = $oldStartPosition->y + $this->height;
                break;
            case Map::WEST :
                $nextStartPosition->x = $oldStartPosition->x - $this->width;
                $nextStartPosition->y = $oldStartPosition->y;
                break;
        }
        return $nextStartPosition;
    }
}