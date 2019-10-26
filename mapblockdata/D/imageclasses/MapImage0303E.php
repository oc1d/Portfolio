<?php
class MapImage0303E extends MapImage {
    
    public function __construct() {
        parent::__construct('0303E');                
        $this->viewPicture = '0303E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);  
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);  
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);  
    }
}