<?php
class MapImage0405S extends MapImage {
    
    public function __construct() {
        parent::__construct('0405S');              
        $this->viewPicture = '0405S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}