<?php
class MapImage0203E extends MapImage {
    
    public function __construct() {
        parent::__construct('0203E');               
        $this->viewPicture = '0203E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
    }
}