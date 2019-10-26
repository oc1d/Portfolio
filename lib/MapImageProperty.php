<?php

class MapImageProperty {

	public $relativePosX;
	public $relativePosY;
	public $relativeDirection;
	public $possibleExtensionKeys;
	public $isWall;
	public $isUserPlace = true;
	public $userId;
	public $user;
	public $userImageWidth;
	public $userImageHeight;
	public $userImageSubPath;
	public $borderPosition;
	public $viewPicture;
	public $imageCssClass;
	public $positionCssClass;
	public $paddingCssClass;
	public $textCssClass;
	public $shortDescriptionCssClass;

    public function __construct($relativeX, $relativeY, $relativeDirection) {
        $this->relativePosX = $relativeX;
        $this->relativePosY = $relativeY;
        $this->relativeDirection = $relativeDirection;
    }
    
	/**
	 *
	 * @return unknown_type
	 */
	public function loadVisualStyleInfo() {
		switch ($this->relativePosY) {
			case 0 :
				$this->userImageWidth = 400;
				$this->userImageHeight = 400;
                $this->boxCssClass = 'minusZeroBox';
                $this->positionCssClass = 'minusZero';
                $this->textCssClass = 'minusOneText';				
				break;
			case -1 :
				$this->userImageWidth = 290;
				$this->userImageHeight = 290;
				if ($this->relativeDirection == Map::EAST || $this->relativeDirection == Map::WEST) {
				    $this->userImageWidth = 240;
                    $this->userImageHeight = 240;
			    }
                $this->boxCssClass = 'minusOneBox';
                $this->positionCssClass = 'minusOne';
                $this->textCssClass = 'hidden minusOneText';				
				$this->user->shortDescription = substr($this->user->shortDescription, 0, 80) . ' ...';
				break;
			case -2 :
				$this->userImageWidth = 200;
				$this->userImageHeight = 200;
		        if ($this->relativeDirection == Map::EAST || $this->relativeDirection == Map::WEST) {
                    $this->userImageWidth = 150;
                    $this->userImageHeight = 150;
                }
				$this->boxCssClass = 'minusTwoBox';
                $this->positionCssClass = 'minusTwo';
                $this->textCssClass = 'hidden minusTwoText';
				$this->user->shortDescription = substr($this->user->shortDescription, 0, 50) . ' ...';
				break;
			case -3 :
				$this->userImageWidth = 140;
				$this->userImageHeight = 140;
		        if ($this->relativeDirection == Map::EAST || $this->relativeDirection == Map::WEST) {
                    $this->userImageWidth = 100;
                    $this->userImageHeight = 100;
                }
				$this->boxCssClass = 'minusThreeBox';
                $this->positionCssClass = 'minusThree';
                $this->textCssClass = 'hidden minusThreeText';
				$this->user->shortDescription = substr($this->user->shortDescription, 0, 30) . ' ...';
				break;
			case -4 :
				$this->userImageWidth = 100;
				$this->userImageHeight = 100;
		        if ($this->relativeDirection == Map::EAST || $this->relativeDirection == Map::WEST) {
                    $this->userImageWidth = 70;
                    $this->userImageHeight = 70;
                }
				$this->boxCssClass = 'minusFourBox';
                $this->positionCssClass = 'minusFour';
                $this->textCssClass = 'hidden minusFourText';
				$this->user->shortDescription = substr($this->user->shortDescription, 0, 20) . ' ...';			
				break;
		}
		if($this->relativeDirection == Map::WEST) {
			$this->imageCssClass .= 'Left';
			$this->positionCssClass .= 'Left';
			$this->boxCssClass .= 'Left';
			$this->shortDescriptionCssClass .= 'Left';
			$this->textCssClass .= 'Left';
			if($this->relativePosY == 0) {
			    $this->boxCssClass .= ' hidden';
			}
		}
	    if($this->relativeDirection == Map::EAST) {
            $this->imageCssClass .= 'Right';
            $this->positionCssClass .= 'Right';
            $this->boxCssClass .= 'Right';
            $this->textCssClass .= 'Right';
            $this->shortDescriptionCssClass .= 'Right';
	        if($this->relativePosY == 0) {
                $this->boxCssClass .= ' hidden';
            }
        }
	}
}
?>