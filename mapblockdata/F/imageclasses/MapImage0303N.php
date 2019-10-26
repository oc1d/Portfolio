<?php
class MapImage0303N extends MapImage {
    
    public function __construct() {
        parent::__construct('0303N');               
        $this->viewPicture = '0303N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
    }
}