<?php
class MapImage0103S extends MapImage {
    
    public function __construct() {
        parent::__construct('0103S');               
        $this->viewPicture = '0103S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
    }
}