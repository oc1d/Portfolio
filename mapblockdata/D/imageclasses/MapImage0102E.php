<?php
class MapImage0102E extends MapImage {
    
    public function __construct() {
        parent::__construct('0102E');               
        $this->viewPicture = '0102E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}