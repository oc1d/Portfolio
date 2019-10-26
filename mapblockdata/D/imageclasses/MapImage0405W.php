<?php
class MapImage0405W extends MapImage {
    
    public function __construct() {
        parent::__construct('0405W');               
        $this->viewPicture = '0405W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
    }
}