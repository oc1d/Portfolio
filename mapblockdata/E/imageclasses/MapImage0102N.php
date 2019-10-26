<?php
class MapImage0102N extends MapImage {
    
    public function __construct() {
        parent::__construct('0102N'); 	     
        $this->viewPicture = '0102N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
    }
}