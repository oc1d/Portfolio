<?php
class MapImageKante1 extends MapImage {
    
    public function __construct() {
        parent::__construct('Kante1'); 
        
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);		
         
        $this->viewPicture = 'Kante1.jpg';
    }
}