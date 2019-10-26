<?php
class MapImage0103W extends MapImage {
    
    public function __construct() {
        parent::__construct('0103W');               
        $this->viewPicture = '0103W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}