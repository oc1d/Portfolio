<?php 
require_once('lib/MapDirectionElement.php');
require_once('lib/MapElement.php');
require_once('lib/Position.php');
require_once('lib/MapBlock.php');
require_once('lib/MapConnection.php');
require_once('lib/MapBlockEntry.php');
require_once('lib/MapBlockEntryManager.php');
require_once('lib/MapImage.php');
require_once('lib/MapSpawnPoint.php');
require_once('lib/MapSpawnPointManager.php');

class Map {

	private $mapElements;
	private $posX;
	private $posY;
	private $direction;
    private $positions;    
		
	public $mapBlock;
	public $mapBlockClass;
	
	const NORTH = 1;
	const EAST = 2;
	const SOUTH = 3;
	const WEST = 4;	
	const LEFT = 4;
	const RIGHT = 2; 
	
	const N = 1;
	const E = 2;
	const S = 3;
	const W = 4;
	const L = 4;
	const R = 2;
	
	public function __construct() {
		$this->mapElements = array();	
		$this->positions = array();   							
	}	
	
	public function buildMap(MapBlockEntry $entry) {
	    $this->mapElements = array();  
		$this->mapBlockClass = 	$entry->mapblockclass;										
		$mapBlock = MapBlock::GetMapBlock($entry->mapblockclass, $entry->fromX, $entry->fromY);
		$mapBlock->setMapElements($this);
		$this->mapBlock = &$mapBlock;				    	  
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getCurrentMapBlockClass() {
		return $this->mapBlockClass;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getDirection() {
		return $this->direction;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getPosX() {
		return $this->posX;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getPosY() {
		return $this->posY;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getActualMapDirectionElement($direction) {
		$element = $this->getElementAt($this->posX, $this->posY);
		if($direction == 1) $direction = 'north';
		if($direction == 2) $direction = 'east';
		if($direction == 3) $direction = 'south';
		if($direction == 4) $direction = 'west';
		$directionElementName = $direction . 'Element';		
		return $element->$directionElementName;
	} 
		
	/**
	 * 
	 * @param unknown_type $x
	 * @param unknown_type $y
	 * @return unknown_type
	 */
	public function setPosition($x, $y) {
		$this->posX = $x;
		$this->posY = $y;	
	}
	
	/**
	 * 
	 * @param unknown_type $direction
	 * @return unknown_type
	 */
	public function setDirection($direction) {
		$this->direction = $direction;		
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function turnLeft() {
		if( $this->direction == Map::NORTH) {
			$this->direction = Map::WEST;
		}
		else if( $this->direction == Map::EAST) {
			$this->direction = Map::NORTH;
		}
		else if( $this->direction == Map::SOUTH) {
			$this->direction = Map::EAST;
		}
		else if( $this->direction == Map::WEST) {
			$this->direction = Map::SOUTH;
		}
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function turnRight() {
		if( $this->direction == Map::NORTH) {
			$this->direction = Map::EAST;
		}
		else if( $this->direction == Map::EAST) {
			$this->direction = Map::SOUTH;
		}
		else if( $this->direction == Map::SOUTH) {
			$this->direction = Map::WEST;
		}
		else if( $this->direction == Map::WEST) {
			$this->direction = Map::NORTH;
		}
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function goForward() {
		if( $this->direction == Map::NORTH) {
			$element = $this->getActualMapDirectionElement(Map::NORTH);			
			if(!$element->isWall) {
				$this->posY--;				
			}
			else return false;
		}
		else if( $this->direction == Map::EAST) {
			$element = $this->getActualMapDirectionElement(Map::EAST);			
			if(!$element->isWall) {
				$this->posX++;
			}
			else return false;
		}
		else if( $this->direction == Map::SOUTH) {
			$element = $this->getActualMapDirectionElement(Map::SOUTH);			
			if(!$element->isWall) {
				$this->posY++;
			}
			else return false;
		}
		else if( $this->direction == Map::WEST) {
			$element = $this->getActualMapDirectionElement(Map::WEST);			
			if(!$element->isWall) {
				$this->posX--;
			}
			else return false;
		}
		return true;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function goBackward() {
		if( $this->direction == Map::NORTH) {
			$element = $this->getActualMapDirectionElement(Map::SOUTH);			
			if(!$element->isWall) {
				$this->posY++;
			}
			else return false;
		}
		else if( $this->direction == Map::EAST) {
			$element = $this->getActualMapDirectionElement(Map::WEST);			
			if(!$element->isWall) {
				$this->posX--;
			}
			else return false;
		}
		else if( $this->direction == Map::SOUTH) {
			$element = $this->getActualMapDirectionElement(Map::NORTH);			
			if(!$element->isWall) {
				$this->posY--;
			}
			else return false;
		}
		else if( $this->direction == Map::WEST) {
			$element = $this->getActualMapDirectionElement(Map::EAST);			
			if(!$element->isWall) {
				$this->posX++;
			}
			else return false;
		}
		return true;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function goLeft() {
	   if( $this->direction == Map::NORTH) {
			$element = $this->getActualMapDirectionElement(Map::WEST);		
			if(!$element->isWall) {
				$this->posX--;
			}
			else return false;
		}
		else if( $this->direction == Map::EAST) {
			$element = $this->getActualMapDirectionElement(Map::NORTH);			
			if(!$element->isWall) {
				$this->posY--;
			}
			else return false;
		}
		else if( $this->direction == Map::SOUTH) {
			$element = $this->getActualMapDirectionElement(Map::EAST);			
			if(!$element->isWall) {
				$this->posX++;
			}
			else return false;
		}
		else if( $this->direction == Map::WEST) {
			$element = $this->getActualMapDirectionElement(Map::SOUTH);			
			if(!$element->isWall) {
				$this->posY++;
			}
			else return false;
		}		
		return true;	
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function goRight() {
	   if( $this->direction == Map::NORTH) {
			$element = $this->getActualMapDirectionElement(Map::EAST);			
			if(!$element->isWall) {
				$this->posX++;
			}
			else return false;
		}
		else if( $this->direction == Map::EAST) {
			$element = $this->getActualMapDirectionElement(Map::SOUTH);			
			if(!$element->isWall) {
				$this->posY++;
			}
			else return false;
		}
		else if( $this->direction == Map::SOUTH) {
			$element = $this->getActualMapDirectionElement(Map::WEST);			
			if(!$element->isWall) {
				$this->posX--;
			}
			else return false;
		}
		else if( $this->direction == Map::WEST) {
			$element = $this->getActualMapDirectionElement(Map::NORTH);			
			if(!$element->isWall) {
				$this->posY--;
			}
			else return false;
		}	
		return true;			
	}
			
	/**
	 * 
	 * @param unknown_type $x
	 * @param unknown_type $y
	 * @return unknown_type
	 */
	public function getElementAt($x, $y) {
		return $this->mapElements[$x][$y];
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function getAllElements() {
		$elements = array();
		foreach ($this->positions as $position){
		    $elements[] = $this->mapElements[$position->x][$position->y];		    
		}
		return $elements;
	}
	
	/**
	 * 
	 * @param unknown_type $x
	 * @param unknown_type $y
	 * @param MapElement $element
	 * @return unknown_type
	 */
	public function setElementAt($x, $y, MapElement $element) {		
		$element->xPos = $x;
		$element->yPos = $y;
		$pos = new Position();
		$pos->x = $x;
		$pos->y = $y;
		$this->positions[] = $pos;
		//var_dump($pos);
		//var_dump($element);
		//die();
		//echo " ELEEMNT SET AT " . $x . ' # ' . $y;
		if(!is_array($this->mapElements[$x])) {
			$this->mapElements[$x] = array();
		}		
		$this->mapElements[$x][$y] = $element;
	}
	
	/**
	 * 
	 * @param unknown_type $relativeDirection
	 * @return unknown_type
	 */
	public function getAbsoluteDirection($relativeDirection) {
		if($this->direction == Map::NORTH) {
			return $relativeDirection;
		}
		if($this->direction == Map::EAST) {
			if ($relativeDirection == Map::NORTH) {
				return $this->direction;
			}
			if ($relativeDirection == Map::EAST) {
				return Map::SOUTH;
			}
			if ($relativeDirection == Map::SOUTH) {
				return Map::WEST;
			}
			if ($relativeDirection == Map::WEST) {
				return Map::NORTH;
			}
		}
		if($this->direction == Map::SOUTH) {
			if ($relativeDirection == Map::NORTH) {
				return $this->direction;
			}
			if ($relativeDirection == Map::EAST) {
				return Map::WEST;
			}
			if ($relativeDirection == Map::SOUTH) {
				return Map::NORTH;
			}
			if ($relativeDirection == Map::WEST) {
				return Map::EAST;
			}
		}
		if($this->direction == Map::WEST) {
			if ($relativeDirection == Map::NORTH) {
				return $this->direction;
			}
			if ($relativeDirection == Map::EAST) {
				return Map::NORTH;
			}
			if ($relativeDirection == Map::SOUTH) {
				return Map::EAST;
			}
			if ($relativeDirection == Map::WEST) {
				return Map::SOUTH;
			}
		}
	}
	
	/**
	 * 
	 * @param unknown_type $relativeDirection
	 * @return unknown_type
	 */
	public function getAbsolutePosition($relativePositionX, $relativePositionY) {
		$position = new Position(); 
		if($this->direction == Map::NORTH) {
			$position->x = $this->posX + $relativePositionX;
			$position->y = $this->posY + $relativePositionY;			
		}
		if($this->direction == Map::EAST) {
			$position->x = $this->posX - $relativePositionY;
			$position->y = $this->posY + $relativePositionX;
		}
		if($this->direction == Map::SOUTH) {
			$position->x = $this->posX - $relativePositionX;
			$position->y = $this->posY - $relativePositionY;
		}
		if($this->direction == Map::WEST) {
			$position->x = $this->posX + $relativePositionY;
			$position->y = $this->posY - $relativePositionX;
		}		
		return $position;	
	}
		
}
?>