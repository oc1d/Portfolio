<?php
class MapImage0502S extends MapImage {
    
    public function __construct() {
        parent::__construct('0502S');
        $this->viewPicture = '0502S.jpg'; 
        
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);
		//$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST);		         
    }
}