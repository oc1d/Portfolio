<?php
class MapImage0205W extends MapImage {
    
    public function __construct() {
        parent::__construct('0205W');               
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);   
        $this->viewPicture = '0205W.jpg';
    }
}