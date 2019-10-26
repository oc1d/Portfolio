<?php
class FileManager {
    
    private $db;
    private $user;
    
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
     * @param User $user
     * @return unknown_type
     */
    public function generateNewImageFilename(User &$user) {
       $this->user = &$user;
       $result = false;
       $i = 0;
       while(!$result && $i < 5) {
           $filename = $this->generateFilename();
           $result = $this->insertFilename($filename);
       }
       if(!$result) throw new Exception("new filename could not be generated");
       return $filename;
    }
    
    /**
     * 
     * @return unknown_type
     */
    private function generateFilename() {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 3)
        {
            $num = rand() % 26;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $this->user->id . $pass . '.jpg';
    }
    
    /**
     * 
     * @param unknown_type $filename
     * @return unknown_type
     */
    private function insertFilename($filename) {
       $values = array();
       $values['filename'] = $this->db->escapeText($filename);
       $sql = $this->db->generateInsert('usedfilename', $values);
       $result = false;
       try { 
            $this->db->query($sql);
            $result = true;
       }
       catch (Exception $e) {
           $result = false;
       }
       if($result) return true;
       return false;
    }
}