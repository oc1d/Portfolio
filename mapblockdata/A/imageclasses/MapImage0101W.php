<?php
class MapImage0101W extends MapImage {
    
    public function __construct() {
        parent::__construct('0101W');            
        $this->viewPicture = '0101W.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);		
    }
}