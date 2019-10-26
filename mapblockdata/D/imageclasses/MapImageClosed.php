<?php
class MapImageClosed extends MapImage {
    
    public function __construct() {
        parent::__construct('Closed');   	            
        $this->viewPicture = 'Closed.jpg';
    }
}