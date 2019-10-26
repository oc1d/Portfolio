<?php
class MapImage0405E extends MapImage {
    
    public function __construct() {
        parent::__construct('0405E');              
        $this->viewPicture = '0405E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
    }
}