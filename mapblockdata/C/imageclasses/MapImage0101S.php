<?php
class MapImage0101S extends MapImage {
    
    public function __construct() {
        parent::__construct('0101S'); 
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT); 
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::RIGHT); 
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT); 
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::RIGHT); 
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH); 
     	$this->viewPicture = '0101S.jpg';
    }
}