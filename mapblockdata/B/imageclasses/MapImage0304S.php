<?php
class MapImage0304S extends MapImage {
    
    public function __construct() {
        parent::__construct('0304S'); 
         $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);                
         $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
        $this->viewPicture = '0304S.jpg';
    }
}