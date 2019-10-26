<?php
class MapImage0403W extends MapImage {

    public function __construct() {
        parent::__construct('0403W');
        $this->viewPicture = '0403W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::N);
    }
}