<?php
class MapImage0504N extends MapImage {
    
    public function __construct() {
        parent::__construct('0504N');               
        $this->viewPicture = '0504N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
    }
}