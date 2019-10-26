<?php
class MapImage0102S extends MapImage {

    public function __construct() {
        parent::__construct('0102S');
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
        $this->viewPicture = '0102S.jpg';
    }
}