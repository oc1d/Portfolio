<?php
class MapPlaceManager {
	private $db;
	
	/**
	 * 
	 * @param DataBase $db
	 * @return unknown_type
	 */
	public function __construct(DataBase &$db) {
		$this->db = &$db;
	}
	
	/**
	 * 
	 * @param unknown_type $row
	 * @return unknown_type
	 */
	private function loadMapPlaceFromRow(&$row) {
		$mapPlace = new MapPlace();
		$mapPlace->x = $row['x'];
		$mapPlace->y = $row['y'];
		$mapPlace->direction = $row['direction'];
		$mapPlace->userid = $row['userid'];
		
		return $mapPlace;
	}	
    
	/**
	 * 
	 * @param User $user
	 * @return unknown_type
	 */
	public function loadUserMapPlace($userId) {
		$sql = "SELECT * FROM `mapplace` WHERE `userid` = " . $this->db->escapeText($userId);
		$result = $this->db->query($sql);
		if ($row = $this->db->fetchArray($result)) {
			return $this->loadMapPlaceFromRow($row);
		}
		return false;
	}
	
	/**
	 * 
	 * @param MapPlace $mapPlace
	 * @return unknown_type
	 */
	public function insertMapPlace(MapPlace &$mapPlace) {
		$values = $this->getValueArray($mapPlace);
		$sql = $this->db->generateInsert('mapplace', $values);
		$result = $this->db->query($sql);
	}
	
	/**
	 * 
	 * @param unknown_type $userId
	 * @return unknown_type
	 */
	public function unsetMapPlace($userId) {
	   $sql = "UPDATE `mapplace` SET `userid` = '0' WHERE `userId` = " . $this->db->escapeText($userId);
	   $result = $this->db->query($sql);
	}
	
	/**
	 * 
	 * @param MapPlace $mapPlace
	 * @return unknown_type
	 */
	public function mapPlaceIsFree(MapPlace &$mapPlace) {
	   $sql = "SELECT `userid` FROM `mapplace` WHERE ";
	   $sql .= "`x` = " .  $this->db->escapeText($mapPlace->x);
	   $sql .= " AND `y` = " .  $this->db->escapeText($mapPlace->y);
	   $sql .= " AND `direction` = " .  $this->db->escapeText($mapPlace->direction);
	   
	   $result = $this->db->query($sql);
	   if($row = $this->db->fetchArray($result)) {
	       if($row['userid'] != '0') return false;
	   }
	   return true;
	}
	
	/**
	 * 
	 * @param MapPlace $mapPlace
	 * @return unknown_type
	 */
	public function updateMapPlace(MapPlace &$mapPlace) {
		$values = $this->getValueArray($mapPlace);
				
		$pkArray = array();
		$pkArray['x'] = $this->db->escapeText($mapPlace->x);
		$pkArray['y'] = $this->db->escapeText($mapPlace->y);
		$pkArray['direction'] = $this->db->escapeText($mapPlace->direction);
		
		$sql = $this->db->generateUpdate('mapplace', $values, false, false, $pkArray);
		$result = $this->db->query($sql);
	}
	
	/**
	 * 
	 * @param MapPlace $mapPlace
	 * @return unknown_type
	 */
	private function getValueArray(MapPlace &$mapPlace) {
		$values = array();
		$values['x'] = $this->db->escapeText($mapPlace->x);
		$values['y'] = $this->db->escapeText($mapPlace->y);
		$values['direction'] = $this->db->escapeText($mapPlace->direction);
		$values['userid'] = $this->db->escapeText($mapPlace->userid);
		return $values;
	}
	
    /**
     * 
     * @return unknown_type
     */
    public function getRandomFreeMapPlace() {
    	$sql = "SELECT * FROM `mapplace` WHERE (`userid` = '0' OR `userid` = NULL)";
    	//$sql .= " AND `blocked` = '0'";
    	$result = $this->db->query($sql);
    	$rows = array();
    	while($row = $this->db->fetchArray($result)) {
    		$rows[] = $row;
    	}
    	$rowCount = count($rows);
		$numbers = range(0, $rowCount - 1);
		shuffle($numbers);  	
    	return $this->loadMapPlaceFromRow($rows[$numbers[0]]);    	
    }
    
    /**
     * 
     * @return unknown_type
     */
    public function getFreeMapPlaceCount() {
    	$sql = "SELECT COUNT(*) as entryCount FROM `mapplace` WHERE (`userid` = '0' OR `userid` = NULL)";
    	$result = $this->db->query($sql);
        if($row = $this->db->fetchArray($result)) {
        	return $row['entryCount'];
        }	
        return 0;
    }    
}