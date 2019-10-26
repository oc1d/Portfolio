<?php
class MapImage0205E extends MapImage {
    
    public function __construct() {
        parent::__construct('0205E');                
        $this->viewPicture = '0205E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
    }
}