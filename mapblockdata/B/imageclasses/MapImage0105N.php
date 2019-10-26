<?php
class MapImage0105N extends MapImage {
    
    public function __construct() {
        parent::__construct('0105N');     
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
        //$this->mapImageProperties[] = new MapImageProperty(1, -2, Map::NORTH);    
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);           
        $this->viewPicture = '0105N.jpg';
    }
}