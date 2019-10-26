<?php
class MapImage0203N extends MapImage {
    
    public function __construct() {
        parent::__construct('0203N');       
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);         
        $this->viewPicture = '0203N.jpg';
    }
}