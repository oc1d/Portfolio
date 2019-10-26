<?php
class MapImage0203E extends MapImage {
    
    public function __construct() {
        parent::__construct('0203E');      
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);         
        $this->viewPicture = '0203E.jpg';
                
    }
}