<?php
class MapImage0305E extends MapImage {
    
    public function __construct() {
        parent::__construct('0305E');    
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);  
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::RIGHT);   
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::RIGHT);   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);              
        $this->viewPicture = '0305E.jpg';
    }
}