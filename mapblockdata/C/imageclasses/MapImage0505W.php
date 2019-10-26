<?php
class MapImage0505W extends MapImage {

    public function __construct() {
        parent::__construct('0505W');
        $this->viewPicture = '0505W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::L);
    }
}