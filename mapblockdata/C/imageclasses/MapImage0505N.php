<?php
class MapImage0505N extends MapImage {
    
    public function __construct() {
        parent::__construct('0505N'); 
        $this->viewPicture = '0505N.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::L);
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::R);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::L);
		$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::N);
		$this->mapImageProperties[] = new MapImageProperty(0, -4, Map::R);	

    }
}