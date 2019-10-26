<?php
class MapImage0303W extends MapImage {
    
    public function __construct() {
        parent::__construct('0303W');               
        $this->viewPicture = '0303W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::RIGHT);
        //$this->mapImageProperties[] = new MapImageProperty(-1, -2, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);
    }
}