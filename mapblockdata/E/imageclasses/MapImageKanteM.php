<?php
class MapImageKanteM extends MapImage {
    
    public function __construct() {
        parent::__construct('KanteM');  		             
        $this->viewPicture = 'KanteM.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}