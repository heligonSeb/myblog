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

    public function edit($title, $intro, $content, $id) {
        $query = 'UPDATE '. $this->table . ' SET title=:title, intro=:intro, content=:content, edit_date=NOW() WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['title'=>$title, 'intro'=>$intro, 'content'=>$content, 'id'=> $id]);
    }

    /**
     * Get all the Post from database
     * @return {Array}
     */
    public function getPostList() {
        $query = 'SELECT * FROM ' . $this->table;
        
        $q = $this->db->prepare($query);
        $q->execute();
        $result = $q->fetchAll(\PDO::FETCH_CLASS, Post::class);

        return $result;
    }

    /**
     * Get one post from database with id as match
     * @param {String}      l'id du post
     * 
     * @return {Object}
     */
    public function getPost($id) {
        $query = 'SELECT * FROM '.$this->table.' WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => intval($id)]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Post::class);
        
        $result = $q->fetch();

        return $result;
    }
}