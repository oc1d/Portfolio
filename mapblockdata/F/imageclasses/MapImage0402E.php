<?php
class MapImage0402E extends MapImage {
    
    public function __construct() {
        parent::__construct('0402E');  	                
        $this->viewPicture = '0402E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);

    }
}