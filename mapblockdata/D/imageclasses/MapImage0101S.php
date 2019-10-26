<?php
class MapImage0101S extends MapImage {
    
    public function __construct() {
        parent::__construct('0101S'); 
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);  
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);  
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);  
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::R);  
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);  
     	$this->viewPicture = '0101S.jpg';
    }
}