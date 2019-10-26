<?php
class MapImage0202W extends MapImage {
    
    public function __construct() {
        parent::__construct('0202W');        
        $this->viewPicture = '0202W.jpg';   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);   
    }
}