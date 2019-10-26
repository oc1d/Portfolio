<?php
class MapImage0101S extends MapImage {
    
    public function __construct() {
        parent::__construct('0101S'); 
     	$this->viewPicture = '0101S.jpg';
     	$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
     	$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
     	$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
    }
}