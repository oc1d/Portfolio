<?php
class MapImage0402S extends MapImage {
    
    public function __construct() {
        parent::__construct('0402S');        
        $this->viewPicture = '0402S.jpg';  
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);   
    }
}