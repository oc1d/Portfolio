<?php
class MapImage0305N extends MapImage {
    
    public function __construct() {
        parent::__construct('0305N');               
        $this->viewPicture = '0305N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
    }
}