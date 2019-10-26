<?php
class MapImage0302E extends MapImage {
    
    public function __construct() {
        parent::__construct('0302E');               
        $this->viewPicture = '0302E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
    }
}