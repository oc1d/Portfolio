<?php
class MapImage0301W extends MapImage {
    
    public function __construct() {
        parent::__construct('0301W');                
        $this->viewPicture = '0301W.jpg';
        
        $this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::EAST);
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::WEST);
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::EAST);

    }
}