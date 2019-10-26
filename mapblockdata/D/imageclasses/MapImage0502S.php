<?php
class MapImage0502S extends MapImage {

    public function __construct() {
        parent::__construct('0502S');
        $this->viewPicture = '0502S.jpg';

        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::N);
         

    }
}