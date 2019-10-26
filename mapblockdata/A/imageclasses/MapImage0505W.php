<?php
class MapImage0505W extends MapImage {
    
    public function __construct() {
        parent::__construct('0505W');               
        $this->viewPicture = '0505W.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);               
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);        
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::EAST);        
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
    }
}