<?php
class MapImage0305E extends MapImage {
    
    public function __construct() {
        parent::__construct('0305E');    
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L); 
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);             
        $this->viewPicture = '0305E.jpg';
    }
}