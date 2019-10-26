<?php
class MapImage0201E extends MapImage {
    
    public function __construct() {
        parent::__construct('0201E');               
        $this->viewPicture = '0201E.jpg';
        
        //$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::SOUTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::WEST);        
        
        //$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::SOUTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
        
        //$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::SOUTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
        
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::SOUTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
        
         //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}