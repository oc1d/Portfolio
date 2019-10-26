<?php
class MapImage0202S extends MapImage {
    
    public function __construct() {
        parent::__construct('0202S');        
        $this->viewPicture = '0202S.jpg';       
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}