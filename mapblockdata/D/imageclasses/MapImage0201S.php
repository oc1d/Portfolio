<?php
class MapImage0201S extends MapImage {
    
    public function __construct() {
        parent::__construct('0201S');      
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);          
        $this->viewPicture = '0201S.jpg';
    }
}