<?php
class MapImage0301E extends MapImage {
    
    public function __construct() {
        parent::__construct('0301E');      
        $this->viewPicture = '0301E.jpg';        
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);		
    }
}