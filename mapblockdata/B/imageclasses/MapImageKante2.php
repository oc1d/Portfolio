<?php
class MapImageKante2 extends MapImage {
    
    public function __construct() {
        parent::__construct('Kante2'); 
        
		$this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);		
         
        $this->viewPicture = 'Kante2.jpg';
    }
}