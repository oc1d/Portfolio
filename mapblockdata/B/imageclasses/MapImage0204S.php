<?php
class MapImage0204S extends MapImage {
    
    public function __construct() {
        parent::__construct('0204S');
         $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);                  
        $this->viewPicture = '0204S.jpg';
    }
}