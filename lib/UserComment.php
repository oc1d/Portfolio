<?php

class UserComment {
	
	public $userId;
	public $commentUserId;
	public $text;
	public $commentUserName;
	public $datePosted;
	public $id;
	
	private $db;
	
	public function __construct(DataBase &$db = null) {
		$this->db = &$db;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function insertComment() {
		$values = array();
		$values['userId'] = $this->db->escapeText($this->userId);
		$values['commentUserId'] = $this->db->escapeText($this->commentUserId);
		$values['text'] = $this->db->escapeText($this->text);
		$values['datePosted'] = 'NOW()';
		$sql = $this->db->generateInsert('usercomment', $values);
		$this->db->query($sql);
	}	
	
	/**
	 * get comments
	 * @param unknown_type $userId
	 * @return unknown_type
	 */
	public function getComments($userId) {
	   $sql = $this->getSelectString();
	   $sql .= "WHERE `userId` = " . $this->db->escapeText($userId);
	   $sql .= " ORDER BY `datePosted` DESC";
	   $comments = array();	   	  
	   $result = $this->db->query($sql);
	   while ($row = $this->db->fetchArray($result)) {
	   	   $comments[] = $this->loadCommentFromRow($row);
	   }
	   return $comments;
	}	
	
	/**
	 * 
	 * @return unknown_type
	 */
	private function getSelectString() {
	   $sql = "SELECT *, `usercomment`.`id` as commentId, `user`.`name` as `commentUserName` FROM `usercomment` ";
       $sql .= " JOIN `user` on `user`.`id` = `usercomment`.`commentUserId` ";
       return $sql;
	}	
	
	/**
	 * 
	 * @param $id
	 * @return unknown_type
	 */
	public function getById($commentId) {
		$sql = $this->getSelectString();
		$sql .= " WHERE `usercomment`.`id` = " . $this->db->escapeText($commentId);
		$comment = false;    
        $result = $this->db->query($sql);
        if ($row = $this->db->fetchArray($result)) {
           $comment = $this->loadCommentFromRow($row);           
        }
        return $comment;     
	}
	
	
   /**
     * get comments
     * @param unknown_type $userId
     * @return unknown_type
     */
    public function getLastComment($userId) {
       if(!$userId) return false;
       $sql = $this->getSelectString();
       $sql .= " WHERE `userId` = " . $this->db->escapeText($userId);
       $sql .= " ORDER BY `datePosted` DESC LIMIT 1";
       $comment = false;    
       $result = $this->db->query($sql);
       if ($row = $this->db->fetchArray($result)) {
           $comment = $this->loadCommentFromRow($row);           
       }
       return $comment;       
    }
	
	/**
	 * 
	 * @param $db
	 * @return unknown_type
	 */
	public function setDb(DataBase &$db) {
		$this->db = &$db;
	}
	
	/**
	 * 
	 * @return unknown_type
	 */
	public function deleteComment() {
		$sql = "DELETE FROM `usercomment` WHERE `id` = " . $this->db->escapeText($this->id);
		$this->db->query($sql);
	}
	
	public function deleteComments($userId) {
		$sql = "DELETE FROM `usercomment` WHERE `userId` = " . $this->db->escapeText($userId);
		$sql .= " OR `commentUserId` = " . $this->db->escapeText($userId);
        $this->db->query($sql);
	}
	
	/**
	 * 
	 * @param unknown_type $row
	 * @return unknown_type
	 */
	private function loadCommentFromRow(&$row) {
		$comment = new UserComment();
		$comment->id = $row['commentId'];
		$comment->userId = $row['userId'];
		$comment->text = $row['text'];
		$comment->commentUserId = $row['commentUserId'];
		$comment->commentUserName = $row['commentUserName'];
		$comment->datePosted = $row['datePosted'];
		return $comment;
	}
}