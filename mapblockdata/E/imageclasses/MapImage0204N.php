<?php
class MapImage0204N extends MapImage {
    
    public function __construct() {
        parent::__construct('0204N');                
        $this->viewPicture = '0204N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}