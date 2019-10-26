<?php
class MapImage0203W extends MapImage {
    
    public function __construct() {
        parent::__construct('0203W');               
        $this->viewPicture = '0203W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        
    }
}