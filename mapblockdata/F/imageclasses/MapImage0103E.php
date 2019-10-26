<?php
class MapImage0103E extends MapImage {
    
    public function __construct() {
        parent::__construct('0103E');   
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);            
        $this->viewPicture = '0103E.jpg';
    }
}