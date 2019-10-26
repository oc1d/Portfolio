<?php
class MapImage0504S extends MapImage {
    
    public function __construct() {
        parent::__construct('0504S');
        $this->viewPicture = '0504S.jpg'; 
        

        $this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST);		
         

    }
}