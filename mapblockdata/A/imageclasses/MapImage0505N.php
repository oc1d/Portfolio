<?php
class MapImage0505N extends MapImage {
    
    public function __construct() {
        parent::__construct('0505N'); 
        $this->viewPicture = '0505N.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);		

    }
}