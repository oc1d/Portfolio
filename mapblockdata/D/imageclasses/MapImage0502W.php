<?php
class MapImage0502W extends MapImage {
    
    public function __construct() {
        parent::__construct('0502W');               
        $this->viewPicture = '0502W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}