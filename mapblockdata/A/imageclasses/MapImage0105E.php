<?php
class MapImage0105E extends MapImage {
    
    public function __construct() {
        parent::__construct('0105E');      
         $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);  
         $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
         $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
         $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);        
        $this->viewPicture = '0105E.jpg';
    }
}