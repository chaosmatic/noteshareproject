<?php
require_once("config.php");

class NotesDbAccess {
    static private $sharedObj = null;
    private $db = null;

    public static function sharedInstance() {
        if (self::$sharedObj === null) {
            self::$sharedObj = new self();
        }

        return self::$sharedObj;
    }

    public function __construct() {
        try {
            $this->db = new PDO(DB_DSN, DB_USR, DB_PWD);
        }
        catch (PDOException $Exception) {
            throw new Exception("DB failed to connect ".$Exception->getMessage());
        }
    }

    /* Example database access function template


    public function getForumPost($id) {
        if ($this->db === null) throw new Exception("DB is not connected");

        $query = "SELECT * FROM `posts` WHERE post_id = :id LIMIT 1";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        if (!$statement->execute()) {
            throw new Exception("Query failed ".$query);
        }
        if ($statement->rowCount() != 1) {
            throw new Exception("No such post!", ERR_NO_POST);
        }

        $post = $statement->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM `comments` WHERE post_id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        if (!$statement->execute()) {
            throw new Exception("Query failed ".$query);
        }
        $post['comments'] = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $post;
    }
    */
}
?>
