<?php
class MapImage0104W extends MapImage {
    
    public function __construct() {
        parent::__construct('0104W');               
        $this->viewPicture = '0104W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}