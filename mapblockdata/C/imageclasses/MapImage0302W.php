<?php
class MapImage0302W extends MapImage {
    
    public function __construct() {
        parent::__construct('0302W');               
        $this->viewPicture = '0302W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);   
    }
}