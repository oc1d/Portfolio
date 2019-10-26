<?php
class MapImage0305N extends MapImage {
    
    public function __construct() {
        parent::__construct('0305N');               
        $this->viewPicture = '0305N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}