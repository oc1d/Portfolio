<?php
class MapImage0101E extends MapImage {
    
    public function __construct() {
        parent::__construct('0101E');   	            
        $this->viewPicture = '0101E.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
    }
}