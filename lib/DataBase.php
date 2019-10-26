<?php

class DataBase {

    var $db_link;
    var $result;
    
    /**
     * Constructor
     * @param $host      
     * @param $user
     * @param $pw
     * @param $dbname
     * @return unknown_type
     */
    public function __construct($host, $user, $pw, $dbname){
        $this->db_link = mysql_connect($host, $user, $pw);
        if(!$this->db_link){
            throw new Exception("could not connect to MySqlServer: '$host'!");            
        }
        if(!mysql_select_db($dbname, $this->db_link)) {
            throw new Exception("could not select database: '$dbname'!");              
        }
        mysql_query('set character set utf8;');
    }

    /**
     * Fires a Database Query
     * @param $sql
     * @return unknown_type
     */
    public function query($sql){
        $this->result =  mysql_query($sql, $this->db_link);
        if(!$this->result){
            throw new Exception("Query failed: " . $sql);
        }        
    }
    
    /**
     * Fetches array
     * @return unknown_type
     */
    public function fetchArray(){
        return mysql_fetch_array($this->result);
    }
    
    /**
     * 
     * @param $tableName
     * @param $values
     * @return unknown_type
     */
    public function generateInsert($tableName, $values) {
    	$sql = "INSERT INTO `$tableName` (";
    	$sqlValues = " VALUES (";    	
    	foreach( $values as $key => $value) {
    		$sql .= "`$key`,";
    		$sqlValues .= $value . ",";
    	}     	
    	// remove last ',', add ")"
    	$sql = substr($sql, 0, -1) . ")";
    	$sqlValues = substr($sqlValues, 0, -1) . ")";    	    	    
    	
    	return $sql . $sqlValues . ';';    	        	   
    }
    
    /**
     * 
     * @param $tableName
     * @param $values
     * @return unknown_type
     */
    public function generateUpdate($tableName, $values, $pkName, $pkValue, $pkArray ) {
        $sql = "UPDATE `$tableName` SET ";        
        foreach( $values as $key => $value) {
            $sql .= "`$key` = $value,";            
        }       
        // remove last ','
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE ";
        if($pkName) {
        	$sql .= "`$pkName` = '$pkValue'";
        } else {
        	foreach ($pkArray as $key => $val) {
        		$sql .= "`$key` = $val";
        		$sql .= " AND ";
        	}
        }                
        $sql = substr($sql, 0, -5);
        return $sql.';';                    
    }
    
    
    /**
     * Escape sql
     * @param $text
     * @return unknown_type
     */
    public function escapeText($text, $addQoutes = true){
    	if(!$addQoutes) return  mysql_real_escape_string(htmlspecialchars($text));            
        return "'" . mysql_real_escape_string(htmlspecialchars($text)) . "'";
    }       
}

?>