<?php
class MapImage0305E extends MapImage {
    
    public function __construct() {
        parent::__construct('0305E');    
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);   
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);            
        $this->viewPicture = '0305E.jpg';
    }
}