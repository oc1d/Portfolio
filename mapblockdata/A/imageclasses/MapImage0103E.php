<?php
class MapImage0103E extends MapImage {
    
    public function __construct() {
        parent::__construct('0103E');               
        $this->viewPicture = '0103E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
    }
}