<?php
class MapImage0105E extends MapImage {

	public function __construct() {
		parent::__construct('0105E');
		$this->mapImageProperties[] = new MapImageProperty(0, -2, Map::NORTH);
		$this->mapImageProperties[] = new MapImageProperty(-1, -2, Map::NORTH);
		$this->viewPicture = '0105E.jpg';
	}
}