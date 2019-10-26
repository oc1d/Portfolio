<?php
class MapImage0405W extends MapImage {
    
    public function __construct() {
        parent::__construct('0405W');               
        $this->viewPicture = '0405W.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
        //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST);  
    }
}