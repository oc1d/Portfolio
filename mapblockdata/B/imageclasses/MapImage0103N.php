<?php
class MapImage0103N extends MapImage {
    
    public function __construct() {
        parent::__construct('0103N');      
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);           
        $this->viewPicture = '0103N.jpg';
    }
}