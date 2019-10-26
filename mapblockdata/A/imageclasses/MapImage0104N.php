<?php
class MapImage0104N extends MapImage {
    
    public function __construct() {
        parent::__construct('0104N');               
        $this->viewPicture = '0104N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
    }
}