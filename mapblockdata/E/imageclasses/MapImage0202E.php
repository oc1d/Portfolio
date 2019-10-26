<?php
class MapImage0202E extends MapImage {
    
    public function __construct() {
        parent::__construct('0202E');        
        $this->viewPicture = '0202E.jpg';  
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);   
    }
}