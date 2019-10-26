<?php
class MapImage0504W extends MapImage {
    
    public function __construct() {
        parent::__construct('0504W');               
        $this->viewPicture = '0504W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}