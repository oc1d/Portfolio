<?php
class MapImage0401E extends MapImage {
    
    public function __construct() {
        parent::__construct('0401E');  	                
        $this->viewPicture = '0401E.jpg';
        
        //$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
        //$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);
		//$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::WEST);

    }
}