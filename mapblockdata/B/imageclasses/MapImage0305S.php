<?php
class MapImage0305S extends MapImage {
    
    public function __construct() {
        parent::__construct('0305S');    
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);             
        $this->viewPicture = '0305S.jpg';
    }
}