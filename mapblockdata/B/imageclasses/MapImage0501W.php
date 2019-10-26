<?php
class MapImage0501W extends MapImage {
    
    public function __construct() {
        parent::__construct('0501W');        
        $this->viewPicture = '0501W.jpg';
       
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::LEFT);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::RIGHT);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::LEFT);
    }
}