<?php
class MapImage0103N extends MapImage {

    public function __construct() {
        parent::__construct('0103N');
        $this->viewPicture = '0103N.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::N);
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
    }
}