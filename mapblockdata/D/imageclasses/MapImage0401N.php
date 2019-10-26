<?php
class MapImage0401N extends MapImage {
    
    public function __construct() {
        parent::__construct('0401N');        
        $this->viewPicture = '0401N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N); 
        
    }
}