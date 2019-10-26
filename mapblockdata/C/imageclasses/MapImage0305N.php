<?php
class MapImage0305N extends MapImage {

    public function __construct() {
        parent::__construct('0305N');
        $this->viewPicture = '0305N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::RIGHT);
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::NORTH);
    }
}