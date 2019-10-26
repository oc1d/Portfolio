<?php
class MapImage0203S extends MapImage {
    
    public function __construct() {
        parent::__construct('0203S');                
        $this->viewPicture = '0304W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);   
    }
}