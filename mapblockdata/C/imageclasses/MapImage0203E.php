<?php
class MapImage0203E extends MapImage {
    
    public function __construct() {
        parent::__construct('0203E');               
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);   
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);   
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);   
        $this->viewPicture = '0203E.jpg';
    }
}