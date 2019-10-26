<?php
class MapImage0105S extends MapImage {
    
    public function __construct() {
        parent::__construct('0105S');               
        $this->viewPicture = '0105S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}