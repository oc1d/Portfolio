<?php
class MapImage0405N extends MapImage {
    
    public function __construct() {
        parent::__construct('0405N');               
        $this->viewPicture = '0405N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
    }
}