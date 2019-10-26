<?php
class MapImage0305N extends MapImage {
    
    public function __construct() {
        parent::__construct('0305N');   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT); 
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);             
        $this->viewPicture = '0305N.jpg';
    }
}