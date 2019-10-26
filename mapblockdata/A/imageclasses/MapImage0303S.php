<?php
class MapImage0303S extends MapImage {
    
    public function __construct() {
        parent::__construct('0303S');               
        $this->viewPicture = '0303S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
    }
}