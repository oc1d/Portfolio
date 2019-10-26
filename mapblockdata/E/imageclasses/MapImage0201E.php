<?php
class MapImage0201E extends MapImage {
    
    public function __construct() {
        parent::__construct('0201E');               
        $this->viewPicture = '0201E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
    }
}