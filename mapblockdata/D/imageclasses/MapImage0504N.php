<?php
class MapImage0504N extends MapImage {
    
    public function __construct() {
        parent::__construct('0504N');               
        $this->viewPicture = '0504N.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::NORTH);
        $this->mapImageProperties[] = new MapImageProperty(0, -3, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);

		
    }
}