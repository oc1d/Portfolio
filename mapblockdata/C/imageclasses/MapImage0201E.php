<?php
class MapImage0201E extends MapImage {
    
    public function __construct() {
        parent::__construct('0201E');               
        $this->viewPicture = '0201E.jpg';
        
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
    }
}