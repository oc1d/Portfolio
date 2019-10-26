<?php
class MapImage0305E extends MapImage {
    
    public function __construct() {
        parent::__construct('0305E');                
        $this->viewPicture = '0305E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
    }
}