<?php
class MapImage0404W extends MapImage {
    
    public function __construct() {
        parent::__construct('0404W');        
        $this->viewPicture = '0404W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}