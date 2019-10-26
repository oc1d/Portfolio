<?php
class MapBlockEntryManager {
	private $db;

	public function __construct(DataBase &$db) {
		$this->db = &$db;
	}

	/**
	 *
	 * @param MapBlockEntry $entry
	 * @return unknown_type
	 */
	public function insertMapBlockEntry (MapBlockEntry $entry) {
		$values = array();
		$values['fromX'] = $this->db->escapeText($entry->fromX);
		$values['fromY'] = $this->db->escapeText($entry->fromY);
		$values['toX'] = $this->db->escapeText($entry->toX);
		$values['toY'] = $this->db->escapeText($entry->toY);
		$values['mapblockclass'] = $this->db->escapeText($entry->mapblockclass);
		$values['inserted'] = 'NOW()';

		$sql = $this->db->generateInsert('mapblockentry', $values);
		$this->db->query($sql);
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function getLastMapBlockEntry() {
		$sql = "SELECT * FROM `mapblockentry` ORDER BY `id` DESC LIMIT 0 , 1";
		$result = $this->db->query($sql);

		if($row = $this->db->fetchArray($result)) {
				return $this->getMapBlockEntryFromRow($row);
		}
		else return false;
	}

	/**
	 *
	 * @param unknown_type $row
	 * @return unknown_type
	 */
	private function getMapBlockEntryFromRow(&$row) {
		$mapBlockEntry = new MapBlockEntry();
		$mapBlockEntry->fromX = $row['fromX'];
		$mapBlockEntry->fromY = $row['fromY'];
		$mapBlockEntry->toX = $row['toX'];
		$mapBlockEntry->toY = $row['toY'];
		$mapBlockEntry->mapblockclass = $row['mapblockclass'];
		$mapBlockEntry->inserted = $row['inserted'];
		$mapBlockEntry->id = $row['id'];
		return $mapBlockEntry;
	}

	/**
	 *
	 * @param unknown_type $posX
	 * @param unknown_type $posY
	 * @return unknown_type
	 */
	public function getMapBlockEntry($posX, $posY) {
		$sql = "SELECT * FROM `mapblockentry`";
		$sql .= " WHERE ";
		$sql .= " `fromX` <= " . $this->db->escapeText($posX);
		$sql .= " AND ";
		$sql .= " `fromY` <= " . $this->db->escapeText($posY);
		$sql .= " AND ";
		$sql .= " `toX` > " . $this->db->escapeText($posX);
        $sql .= " AND ";
        $sql .= " `toY` > " . $this->db->escapeText($posY);
              
        $result = $this->db->query($sql);
        if($row = $this->db->fetchArray($result)) {
                return $this->getMapBlockEntryFromRow($row);
        }
        else return false;
	}

}