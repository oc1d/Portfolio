<?php
class MapImage0104S extends MapImage {
    
    public function __construct() {
        parent::__construct('0104S');               
        $this->viewPicture = '0104S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
    }
}