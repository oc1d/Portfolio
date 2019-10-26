<?php
class MapImage0304W extends MapImage {
    
    public function __construct() {
        parent::__construct('0304W');   
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);            
        $this->viewPicture = '0304W.jpg';
    }
}