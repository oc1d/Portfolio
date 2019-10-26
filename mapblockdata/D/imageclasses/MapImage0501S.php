<?php
class MapImage0501S extends MapImage {

    public function __construct() {
        parent::__construct('0501S');
        $this->viewPicture = '0501S.jpg';

        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);         
    }
}