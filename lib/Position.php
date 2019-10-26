<?php
class Position {
    
	public $x;
	public $y;
	
	public function __construct($x = false, $y = false) {
        $this->x = $x;
        $this->y = $y;        
    }
    	
}