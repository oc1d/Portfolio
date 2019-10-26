<?php
class MapImage0404N extends MapImage {
    
    public function __construct() {
        parent::__construct('0404N');                
        $this->viewPicture = '0404N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);


    }
}