<?php
class MapImageKanteL extends MapImage {
    
    public function __construct() {
        parent::__construct('KanteL');  		             
        $this->viewPicture = 'KanteL.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}