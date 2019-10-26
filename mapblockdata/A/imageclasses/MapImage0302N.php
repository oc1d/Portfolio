<?php
class MapImage0302N extends MapImage {
    
    public function __construct() {
        parent::__construct('0302N');               
        $this->viewPicture = '0302N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);        
    }
}