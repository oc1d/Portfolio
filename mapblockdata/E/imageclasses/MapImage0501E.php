<?php
class MapImage0501E extends MapImage {
    
    public function __construct() {
        parent::__construct('0501E'); 
        $this->viewPicture = '0501E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}