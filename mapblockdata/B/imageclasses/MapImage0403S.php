<?php
class MapImage0403S extends MapImage {
    
    public function __construct() {
        parent::__construct('0403S');                    
        $this->viewPicture = '0403S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}