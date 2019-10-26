<?php
class MapImage0205E extends MapImage {
    
    public function __construct() {
        parent::__construct('0205E');   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);   
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST); 
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);            
        $this->viewPicture = '0205E.jpg';
    }
}