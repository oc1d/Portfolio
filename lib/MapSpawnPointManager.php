<?php
class MapSpawnPointManager {
    
    private $db;
    
    /**
     * 
     * @param $db
     * @return unknown_type
     */
    public function __construct(DataBase &$db) {
        $this->db = &$db;
    }
    
    /**
     * 
     * @param $spawnPoint
     * @return unknown_type
     */
    public function insertSpawnPoint(MapSpawnPoint &$spawnPoint) {
        $values = array();
        $values['x'] = $spawnPoint->x;
        $values['y'] = $spawnPoint->y;
        $values['direction'] = $spawnPoint->direction;
        $sql = $this->db->generateInsert('mapspawnpoint', $values);
        $result = $this->db->query($sql);        
    }    
    
    /**
     * 
     * @return unknown_type
     */
    public function getRandomSpawnPoint() {
       $sql = "SELECT * FROM `mapspawnpoint`";        
        $result = $this->db->query($sql);
        $rows = array();
        while($row = $this->db->fetchArray($result)) {
            $rows[] = $row;
        }
        $rowCount = count($rows);
        $numbers = range(0, $rowCount - 1);
        shuffle($numbers);              
        return $this->loadFromRow($rows[$numbers[0]]);       
    }
    
    /**
     * 
     * @param $row
     * @return unknown_type
     */
    private function loadFromRow(&$row) {
       $point = new MapSpawnPoint();
       $point->x = $row['x'];
       $point->y = $row['y'];
       $point->direction = $row['direction'];
       return $point; 
    }
}