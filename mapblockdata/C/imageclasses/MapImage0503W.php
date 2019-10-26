<?php
class MapImage0503W extends MapImage {

    public function __construct() {
        parent::__construct('0503W');
        $this->viewPicture = '0503W.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::R);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
    }
}