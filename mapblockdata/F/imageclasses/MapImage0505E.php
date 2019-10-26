<?php
class MapImage0505E extends MapImage {
    
    public function __construct() {
        parent::__construct('0505E'); 
        
       	$this->viewPicture = '0505E.jpg';
        
       $this->mapImageProperties[] = new MapImageProperty(0, 0, Map::NORTH);
    }
}