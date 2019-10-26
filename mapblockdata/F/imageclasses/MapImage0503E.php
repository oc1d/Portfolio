<?php
class MapImage0503E extends MapImage {

    public function __construct() {
        parent::__construct('0503E');
        $this->viewPicture = '0503E.jpg';
        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
    }
}