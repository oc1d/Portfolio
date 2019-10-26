<?php
require_once ('lib/MapImageProperty.php');
class MapImage {

	public $mapImageProperties;
	public $viewPicture;
	public $key;

	public function __construct($key) {
		$this->key = $key;
		$this->mapImageProperties = array();
	}

	/**
	 *
	 * @param unknown_type $class
	 * @return unknown_type
	 */
	public static function GetMapImageFromClass($class, $blockClass) {
		if($class == '' || $blockClass == '') return false;
		$className = 'MapImage' . $class;
		$filepath = 'mapblockdata/' . $blockClass . '/imageclasses/'. $className  . '.php';
		require_once ($filepath);
		return new $className(false, false);
	}

}
?>