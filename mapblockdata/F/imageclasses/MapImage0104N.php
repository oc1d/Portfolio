<?php
class MapImage0104N extends MapImage {
    
    public function __construct() {
        parent::__construct('0104N');               
        $this->viewPicture = '0104N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
    }
}