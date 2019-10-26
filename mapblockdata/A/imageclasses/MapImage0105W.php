<?php
class MapImage0105W extends MapImage {
    
    public function __construct() {
        parent::__construct('0105W');               
        $this->viewPicture = '0105W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);  
    }
}