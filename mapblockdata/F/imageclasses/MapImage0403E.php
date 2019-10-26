<?php
class MapImage0403E extends MapImage {
    
    public function __construct() {
        parent::__construct('0403E');              
        $this->viewPicture = '0403E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
    }
}