<?php
class MapImage0503E extends MapImage {
    
    public function __construct() {
        parent::__construct('0503E'); 
	      
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);	
        $this->viewPicture = '0503E.jpg';
    }
}