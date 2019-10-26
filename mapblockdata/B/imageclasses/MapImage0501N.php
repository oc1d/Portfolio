<?php
class MapImage0501N extends MapImage {
    
    public function __construct() {
        parent::__construct('0501N');               
        $this->viewPicture = '0501N.jpg';
        
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);

    }
}