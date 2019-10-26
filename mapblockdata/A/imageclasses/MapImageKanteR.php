<?php
class MapImageKanteR extends MapImage {
    
    public function __construct() {
        parent::__construct('KanteR');      
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);		         
        $this->viewPicture = 'KanteR.jpg';
    }
}