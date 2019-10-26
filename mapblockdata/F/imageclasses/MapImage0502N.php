<?php
class MapImage0502N extends MapImage {
    
    public function __construct() {
        parent::__construct('0502N');               
        $this->viewPicture = '0502N.jpg';                
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
    }
}