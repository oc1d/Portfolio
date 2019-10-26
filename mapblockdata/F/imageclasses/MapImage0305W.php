<?php
class MapImage0305W extends MapImage {
    
    public function __construct() {
        parent::__construct('0305W');               
        $this->viewPicture = '0305W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
    }
}