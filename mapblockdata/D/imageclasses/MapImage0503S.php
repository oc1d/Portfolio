<?php
class MapImage0503S extends MapImage {

    public function __construct() {
        parent::__construct('0503S');
        $this->viewPicture = '0503S.jpg';

        $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::N);
         
    }
}