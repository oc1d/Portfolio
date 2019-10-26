<?php
class MapImage0205E extends MapImage {
    
    public function __construct() {
        parent::__construct('0205E');   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);            
        $this->viewPicture = '0205E.jpg';
    }
}