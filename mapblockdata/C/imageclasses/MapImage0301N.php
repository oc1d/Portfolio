<?php
class MapImage0301N extends MapImage {
    
    public function __construct() {
        parent::__construct('0301N');               
        $this->viewPicture = '0301N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0,0, Map::NORTH);  
    }
}