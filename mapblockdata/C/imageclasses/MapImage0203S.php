<?php
class MapImage0203S extends MapImage {
    
    public function __construct() {
        parent::__construct('0203S');                
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);   
        $this->viewPicture = '0203S.jpg';
    }
}