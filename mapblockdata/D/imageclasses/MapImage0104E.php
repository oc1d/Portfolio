<?php
class MapImage0104E extends MapImage {
    
    public function __construct() {
        parent::__construct('0104E');   
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);              
        $this->viewPicture = '0104E.jpg';
    }
}