<?php
class MapImage0401W extends MapImage {
    
    public function __construct() {
        parent::__construct('0401W');                   
        $this->viewPicture = '0401W.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
    }
}