<?php
class MapImage0503N extends MapImage {
    
    public function __construct() {
        parent::__construct('0503N');               
        $this->viewPicture = '0503N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
    }
}