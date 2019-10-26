<?php
class MapImage0103E extends MapImage {
    
    public function __construct() {
        parent::__construct('0103E');   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);     
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);  
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);  
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);  
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);         
        $this->viewPicture = '0103E.jpg';
    }
}