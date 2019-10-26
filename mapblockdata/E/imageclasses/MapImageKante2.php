<?php
class MapImageKante2 extends MapImage {
    
    public function __construct() {
        parent::__construct('Kante2'); 
        $this->viewPicture = 'Kante2.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}