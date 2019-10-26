<?php
class MapImage0101N extends MapImage {
    
    public function __construct() {
        parent::__construct('0101N');        
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);         
        $this->viewPicture = '0101N.jpg';
    }
}