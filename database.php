<?php
class databaseaccess {

	public $hostname = 'localhost';
	public $username = 'root';
	public $password = 'root';
	private $db = null;
	public $rows;

  	public function __construct() {
        	try {
       			$this->db = new PDO("mysql:host=$hostname;dbname=noteshareproject", $this->username, $this->password);
     		}
        	catch (PDOException $Exception) {
           		throw new Exception("DB failed to connect ".$Exception->getMessage());
     		}
    	}

	public function displayposts($lbound,$PostPerPage) {
		if ($this->db === null) throw new Exception("DB is not connected");
		$query = "SELECT * FROM files ORDER BY `id` DESC LIMIT :lbound, :PostPerPage";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':lbound', $lbound, PDO::PARAM_INT);
		$statement->bindValue(':PostPerPage', $PostPerPage, PDO::PARAM_INT);
		$statement->execute();
		$this->result = $statement->fetchAll(PDO::FETCH_ASSOC);
		//var_dump($this->result); //debugging only
	}

	public function displaybyid($id) {
		if ($this->db === null) throw new Exception("DB is not connected");
		$query = "SELECT * FROM files WHERE id = :id";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
		$this->result = $statement->fetch(PDO::FETCH_ASSOC);
	}


	public function write($topic,$subject,$author,$path){
		if ($this->db === null) throw new Exception("DB is not connected");

		$query = "INSERT INTO `noteshareproject`.`files` (`topic` ,`subject` ,`author` ,`path`) VALUES (:topic, :subject, :author, :path);";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':topic', $topic, PDO::PARAM_STR);
		$statement->bindValue(':subject', $subject, PDO::PARAM_STR);
		$statement->bindValue(':author', $author, PDO::PARAM_STR);
		$statement->bindValue(':path', $path, PDO::PARAM_STR);
		$statement->execute();
	}
	//Needs to be re-written to suit noteshareproject
	public function delete($id){ 
		if ($this->db === null) throw new Exception("DB is not connected");

		$query = "DELETE FROM `Blogging-Platform`.`posts` WHERE `posts`.`id` = :id";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
	}

	public function update($title,$text,$id){ 
		if ($this->db === null) throw new Exception("DB is not connected");

		$query = "UPDATE `Blogging-Platform`.`posts` SET `title` = :title,
`text` = :text WHERE `posts`.`id` = :id;";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':title', $title, PDO::PARAM_STR);
		$statement->bindValue(':text', $text, PDO::PARAM_STR);
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();
	}
	//CRYPTO RELATED 
	public function gethash(){
		if ($this->db === null) throw new Exception("DB is not connected");
		$query = "SELECT * FROM crypto ORDER BY `id` DESC LIMIT 1";
		$statement = $this->db->prepare($query);
		$statement->execute();
		$temp = $statement->fetch(PDO::FETCH_ASSOC);
		$this->hash = $temp['hash'];
	}
	
	public function writehash($hash){
		if ($this->db  === null) throw new Exception("DB is not connected");

		$query = "UPDATE `Blogging-Platform`.`crypto` SET `hash` = :hash WHERE `crypto`.`id` = 1";
		$statement = $this->db->prepare($query);
		$statement->bindValue(':hash', $hash, PDO::PARAM_STR);
		$statement->execute();
	}

	public function count(){
		if ($this->db === null) throw new Exception("DB is not connected");

		$query = "SELECT COUNT(*) FROM `Blogging-Platform`.`posts`";
		$statement = $this->db->prepare($query);
		$statement->execute();
		$tempcount = $statement->fetch(PDO::FETCH_ASSOC);
		$this->amount = $tempcount['COUNT(*)'];

	}
}

?>
