<?php
class MapImage0103E extends MapImage {
    
    public function __construct() {
        parent::__construct('0103E');               
        $this->viewPicture = '0103E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::R);
    }
}