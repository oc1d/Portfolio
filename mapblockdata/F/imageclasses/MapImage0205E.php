<?php
class MapImage0205E extends MapImage {
    
    public function __construct() {
        parent::__construct('0205E');   
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);             
        $this->viewPicture = '0205E.jpg';
    }
}