<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Comments;

class CommentsRepository 
{
    private $db;
    private $table="comments";

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    public function getAllComments($postId) {
        $query = 'SELECT * FROM '.$this->table.' WHERE post_id=:postId';

        $q = $this->db->prepare($query);
        $q->execute(['postId' => $postId]);

        $result = $q->fetchAll(\PDO::FETCH_CLASS, Comments::class);
        
        return $result;
    }
}