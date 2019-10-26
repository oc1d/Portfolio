<?php
class MapDirectionElement {
	public $isWall;
    public $userPicture;
    public $viewPicture;
    public $name;
    public $mapImageClassKey;
    public $isSpawnPoint;
    
    public function __construct($isWall = false, $mapImageClassKey = false, $isSpawnPoint = false) {
        $this->isWall = $isWall;
        $this->mapImageClassKey = $mapImageClassKey;
        $this->isSpawnPoint = $isSpawnPoint;
    }    

}