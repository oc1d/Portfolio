<?php
class MapImage0103E extends MapImage {
    
    public function __construct() {
        parent::__construct('0103E');           
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);  
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT);  
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::LEFT);      
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        $this->viewPicture = '0103E.jpg';
    }
}