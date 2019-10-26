<?php
class MapImage0402W extends MapImage {
    
    public function __construct() {
        parent::__construct('0402W');        
        $this->viewPicture = '0402W.jpg';       
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N); 
    }
}