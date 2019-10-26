<?php
class MapImage0103S extends MapImage {
    
    public function __construct() {
        parent::__construct('0103S');      
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);            
        $this->viewPicture = '0103S.jpg';
    }
}