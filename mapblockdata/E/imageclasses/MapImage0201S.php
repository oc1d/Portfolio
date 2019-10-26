<?php
class MapImage0201S extends MapImage {
    
    public function __construct() {
        parent::__construct('0201S');                 
        $this->viewPicture = '0201S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
    }
}