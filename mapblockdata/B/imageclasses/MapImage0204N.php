<?php
class MapImage0204N extends MapImage {

	public function __construct() {
		parent::__construct('0204N');
		$this->mapImageProperties[] = new MapImageProperty(0, -1, Map::NORTH);
		$this->viewPicture = '0204N.jpg';
	}
}