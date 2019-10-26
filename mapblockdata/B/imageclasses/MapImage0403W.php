<?php
class MapImage0403W extends MapImage {
    
    public function __construct() {
        parent::__construct('0401W');        
        $this->mapImageProperties[] = new MapImageProperty(0,-3, Map::NORTH);  
        //$this->mapImageProperties[] = new MapImageProperty(-1,-3, Map::NORTH);    
        $this->mapImageProperties[] = new MapImageProperty(0,-3, Map::RIGHT);    
        $this->mapImageProperties[] = new MapImageProperty(0,-2, Map::RIGHT);  
        $this->mapImageProperties[] = new MapImageProperty(0,-1, Map::RIGHT);                
        $this->viewPicture = '0403W.jpg';
    }
}