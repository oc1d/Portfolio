<?php
/**
 *
 * @author heiler
 *
 */
class UserManager {


	private $db;

	/**
	 *
	 * @param $db
	 * @return unknown_type
	 */
	public function __construct(&$db) {
		$this->db = &$db;
	}

	/**
	 *
	 * @param $userId
	 * @return unknown_type
	 */
	public function loadUser($userId) {
		$sql = "SELECT * FROM `user` WHERE `id` = " . $this->db->escapeText($userId);
		$result = $this->db->query($sql);
		if ($row = $this->db->fetchArray($result)) {
			return $this->loadUserFromRow($row);
		}
	}

	/**
	 *
	 * @param unknown_type $row
	 * @return unknown_type
	 */
	private function loadUserFromRow(&$row) {
		$user = new User();
		$user->id = $row['id'];
		$user->name = $row['name'];
		$user->password = $row['password'];
		$user->shortDescription = $row['shortDescription'];
		$user->weblink = $row['weblink'];
		$user->email = $row['email'];
		$user->imageFilename = $row['imageFilename'];
		$user->newsletter = $row['newsletter'];
		$user->allowsComments = $row['allowsComments'];
		return $user;
	}

	/**
	 *
	 */
	public function saveUser(User &$user) {
		$values = array();
		$values['name'] = $this->db->escapeText($user->name);
		$values['password'] = $this->db->escapeText($user->password);
		$values['shortDescription'] = $this->db->escapeText($user->shortDescription);
		$values['weblink'] = $this->db->escapeText($user->weblink);
		$values['email'] = $this->db->escapeText($user->email);
		$values['imageFilename'] = $this->db->escapeText($user->imageFilename);
		$values['newsletter'] = $this->db->escapeText($user->newsletter);
		$values['allowsComments'] = $this->db->escapeText($user->allowsComments);

		$pkArray = array();
		$pkArray['id'] = $user->id;

		if($user->id) {
			$sql = $this->db->generateUpdate('user', $values, false, false, $pkArray);
		} else {
			$sql = "SELECT * FROM `user` WHERE `email` = " . $this->db->escapeText($user->email);
			$result = $this->db->query($sql);
			if($row = $this->db->fetchArray($result)) {
				$e = new Exception("ein Benutzer mit dieser E-mail-Adresse existiert bereits.");
				throw $e;
			}
			$sql = $this->db->generateInsert('user', $values);
		}
		$result = $this->db->query($sql);
	}

	/**
	 *
	 * @param $username
	 * @param $password
	 * @return unknown_type
	 */
	public function getUser($email, $password) {
		$sql = "SELECT * FROM `user`";
		$sql .= " WHERE `email` = " . $this->db->escapeText($email);
		$sql .= " AND `password` = " . $this->db->escapeText(sha1($password));
		$result = $this->db->query($sql);
		if ($row = $this->db->fetchArray($result)) {
			return $this->loadUserFromRow($row);
		}
		else throw new Exception("E-Mail und/oder Passwort falsch.");
	}

	/**
	 *
	 * @param $username
	 * @param $password
	 * @return unknown_type
	 */
	public function getUserById($id) {
		$sql = "SELECT * FROM `user`";
		$sql .= " WHERE `id` = " . $this->db->escapeText($id);
		$result = $this->db->query($sql);
		if ($row = $this->db->fetchArray($result)) {
			return $this->loadUserFromRow($row);
		}
		else throw new Exception("could not get user");
	}

	/**
	 *
	 * @param unknown_type $email
	 * @return unknown_type
	 */
	public function getUserId($email) {
		$sql = "SELECT `id` FROM `user` WHERE `email` = " . $this->db->escapeText($email);
		$result = $this->db->query($sql);
		if($row = $this->db->fetchArray($result)) {
			return $row['id'];
		}
		return false;
	}

	/**
	 *
	 * @param $token
	 * @return unknown_type
	 */
	public function checkLoginAndGetUser($token) {
		$sql = "SELECT `userId` FROM `userlogin` WHERE `token` = " . $this->db->escapeText($token);
		$result = $this->db->query($sql);
		if($row = $this->db->fetchArray($sql)) {
			return $this->loadUser($row['userId']);
		}
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function getNewsletterEmailAdresses() {
		$sql = "SELECT `email` FROM `user` WHERE `newsletter` = '1'";
		$emails = array();
		$result = $this->db->query($sql);
		while($row = $this->db->fetchArray($sql)) {
			$emails[] = $row['email'];
		}
		return $emails;
	}


	/**
	 *
	 * @return unknown_type
	 */
	public function saveLogin(User &$user, $token) {
		$sql = "DELETE FROM `userlogin` WHERE `userId` = " . $this->db->escapeText($user->id);
		$sql .= " OR `token` = " . $this->db->escapeText($token);
		$result = $this->db->query($sql);
		 
		$values = array();
		$values['token']      = $this->db->escapeText($token);
		$values['userId']     = $this->db->escapeText($user->id);
		$values['lastAction'] = "NOW()";
		 
		$sql = $this->db->generateInsert('userlogin', $values);
		$result = $this->db->query($sql);
	}

	/**
	 *
	 * @param $deletingUser
	 * @param $userId
	 * @return unknown_type
	 */
	public function deleteUser($toDeleteUserId) {
		$sql = "DELETE FROM `user` WHERE `id` = " . $this->db->escapeText($toDeleteUserId);
		$this->db->query($sql);
	}

	/**
	 *
	 * @param $email
	 * @return unknown_type
	 */
	public static function EmailAddressValid($email) {
		return preg_match("/[\.a-z0-9_-]+@[a-z0-9-]{2,}\.[a-z]{2,4}$/i",$email);
	}

	/**
	 *
	 * @return unknown_type
	 */
	public function getMapUser($posX, $posY, $direction) {
		$sql = "SELECT * FROM `user`";
		$sql .= " JOIN `mapplace` ON `user`.`id` = `mapplace`.`userid`";
		$sql .= " WHERE `mapplace`.`x` = " . $this->db->escapeText($posX);
		$sql .= " AND `mapplace`.`y` = " . $this->db->escapeText($posY);
		$sql .= " AND `mapplace`.`direction` = " . $this->db->escapeText($direction);
		$result = $this->db->query($sql);
		if($row = $this->db->fetchArray($result)) return $this->loadUserFromRow($row);
		return false;
	}

	/**
	 *
	 * @param unknown_type $searchphrase
	 * @return unknown_type
	 */
	public function searchUsers($searchphrase) {
		if(!$searchphrase) {
			$sql = "SELECT * FROM `user`";
		} else {

			$phrase = "'%" . $this->db->escapeText($searchphrase, false) . "%'";
			$sql = "SELECT * FROM `user`";
			$sql .= " WHERE `name` LIKE $phrase";
			$sql .= " OR `shortdescription` LIKE $phrase";
			$sql .= " OR `email` LIKE $phrase";
			$sql .= " OR `weblink` LIKE $phrase";
		}

		$users = array();
		$result = $this->db->query($sql);
		while($row = $this->db->fetchArray($result)) {
			$users[] =  $this->loadUserFromRow($row);
		}
		return $users;
	}

}
?>
