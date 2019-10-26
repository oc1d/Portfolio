<?php
class MapImage0105E extends MapImage {
    
    public function __construct() {
        parent::__construct('0105E');      
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);        
        $this->viewPicture = '0105E.jpg';
    }
}