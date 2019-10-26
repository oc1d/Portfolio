<?php
class MapImage0302S extends MapImage {
    
    public function __construct() {
        parent::__construct('0302S');               
        $this->viewPicture = '0302S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
    }
}