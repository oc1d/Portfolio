<?php
class MapImage0104E extends MapImage {
    
    public function __construct() {
        parent::__construct('0104E');                
        $this->viewPicture = '0104E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
    }
}