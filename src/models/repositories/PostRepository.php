<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Post;

class PostRepository 
{
    private $db;
    private $table="post";

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    public function add($title, $intro, $content) {
        $id = 2;

        $query = 'INSERT INTO '. $this->table . '(title,intro,content,creat_date,edit_date,user_id) VALUES (:title, :intro, :content, NOW(), null, :id)';

        $q = $this->db->prepare($query);
        $q->execute(['title'=>$title, 'intro'=>$intro, 'content'=>$content, 'id'=> $id]);
    }
}