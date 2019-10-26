<?php
class MapImage0201W extends MapImage {
    
    public function __construct() {
        parent::__construct('0201W');                 
        $this->viewPicture = '0201W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);

    }
}