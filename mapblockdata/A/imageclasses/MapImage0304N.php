<?php
class MapImage0304N extends MapImage {
    
    public function __construct() {
        parent::__construct('0304N');               
        $this->viewPicture = '0304N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
    }
}