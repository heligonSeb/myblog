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
        $query = 'SELECT c.id,c.title,c.comment,c.validate,c.creat_date,c.user_id,c.post_id,u.lastname,u.firstname FROM '.$this->table.' c INNER JOIN users u ON c.user_id=u.id WHERE c.post_id=:postId';

        $q = $this->db->prepare($query);
        $q->execute(['postId' => $postId]);

        $result = $q->fetchAll(\PDO::FETCH_CLASS, Comments::class);
        
        return $result;
    }

    public function add($title, $comment, $post_id, $user_id) {
        /**Si admin add comment validate 1 */
        $query = 'INSERT INTO '.$this->table.'(title, comment, validate, creat_date, user_id, post_id) VALUES (:title, :comment, 0, NOW(), :user_id, :post_id) ';

        $q = $this->db->prepare($query);
        $q->execute(['title' => $title, 'comment' => $comment, 'user_id' => $user_id, 'post_id' => $post_id]);
    }
}