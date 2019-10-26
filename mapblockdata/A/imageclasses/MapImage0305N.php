<?php
class MapImage0305N extends MapImage {
    
    public function __construct() {
        parent::__construct('0305N');               
        $this->viewPicture = '0305N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);               
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
        //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST); 
    }
}