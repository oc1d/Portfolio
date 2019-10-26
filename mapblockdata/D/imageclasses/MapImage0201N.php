<?php
class MapImage0201N extends MapImage {
    
    public function __construct() {
        parent::__construct('0201N');               
        $this->viewPicture = '0201N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}