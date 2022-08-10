<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Comments;
use App\models\entities\Users;

class CommentsRepository 
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    /**
     * Select all comment from database
     * 
     * @param {Integer} $postId     the id from a post
     */
    public function getAllComments($postId) {
        $query = 'SELECT c.id,c.title,c.comment,c.validate,c.creat_date,c.user_id,c.post_id,u.lastname,u.firstname FROM comments c INNER JOIN users u ON c.user_id=u.id WHERE c.post_id=:postId';

        $q = $this->db->prepare($query);
        $q->execute(['postId' => $postId]);

        $result = $q->fetchAll(\PDO::FETCH_CLASS, Comments::class);
        
        return $result;
    }

    /**
     * Insert a new comment in database
     * 
     * @param {String} $title       the title from comment
     * @param {String} $comment     the comment content
     * @param {Integer} $post_id    the id from a post where we add the comment
     * @param {Object} $user        the user connected
     */
    public function add($title, $comment, $post_id, Users $user) {
        $validate = 0;
        
        if($user->status == 'admin') {
            $validate = 1;
        }

        $query = 'INSERT INTO comments (title, comment, validate, creat_date, user_id, post_id) VALUES (:title, :comment, :validate, NOW(), :user_id, :post_id) ';

        $q = $this->db->prepare($query);
        $q->execute(['title' => $title, 'comment' => $comment,'validate' => $validate, 'user_id' => $user->id, 'post_id' => $post_id]);
    }

    /**
     * Update the Validate field to a comment in database
     * 
     * @param {Integer} $id     the id of the comment
     */
    public function validate($id) {
        $query = 'UPDATE comments SET validate=1 WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => $id]);
    }
}
