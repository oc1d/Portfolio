<?php
class MapImage0204W extends MapImage {
    
    public function __construct() {
        parent::__construct('0204W'); 
         $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);                 
        $this->viewPicture = '0204W.jpg';
    }
}