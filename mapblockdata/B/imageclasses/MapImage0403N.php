<?php
class MapImage0403N extends MapImage {
    
    public function __construct() {
        parent::__construct('0401N');                    
        $this->viewPicture = '0403N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}