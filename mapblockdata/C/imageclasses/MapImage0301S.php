<?php
class MapImage0301S extends MapImage {

    public function __construct() {
        parent::__construct('0301S');
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
        $this->viewPicture = '0301S.jpg';

    }
}