<?php
class MapImage0105N extends MapImage {
    
    public function __construct() {
        parent::__construct('0105N');               
        $this->viewPicture = '0105N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
    }
}