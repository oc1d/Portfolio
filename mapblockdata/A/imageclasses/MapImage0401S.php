<?php
class MapImage0401S extends MapImage {
    
    public function __construct() {
        parent::__construct('0401S');                   
        $this->viewPicture = '0401S.jpg';        
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}