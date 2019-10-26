<?php
class MapImage0501S extends MapImage {
    
    public function __construct() {
        parent::__construct('0501S');
        $this->viewPicture = '0501S.jpg'; 
        
        $this->mapImageProperties[] = new MapImageProperty(0, -4, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -3, Map::EAST);
		//this->mapImageProperties[] = new MapImageProperty(0, -3, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		//$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
		//$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST);		
         

    }
}