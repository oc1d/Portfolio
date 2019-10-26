<?php
class MapImageKanteR extends MapImage {
    
    public function __construct() {
        parent::__construct('KanteR');      		         
        $this->viewPicture = 'KanteR.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}