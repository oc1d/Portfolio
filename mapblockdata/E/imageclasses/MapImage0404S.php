<?php
class MapImage0404S extends MapImage {
    
    public function __construct() {
        parent::__construct('0404S');                
        $this->viewPicture = '0404S.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
    }
}