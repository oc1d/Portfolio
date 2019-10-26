<?php
class MapImage0205N extends MapImage {
    
    public function __construct() {
        parent::__construct('0205N');
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);   
        //$this->mapImageProperties[] = new MapImageProperty(-1, -2, Map::NORTH);                    
        $this->viewPicture = '0205N.jpg';
    }
}