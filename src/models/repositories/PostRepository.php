<?php


namespace App\models\repositories;

use App\services\database\Database;
use App\models\entities\Post;

class PostRepository 
{
    private $db;
    const table="post";

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    /**
     * Insert a new post in database
     * 
     * @param {String} $title       the post title
     * @param {String} $intro       the post intro, short text
     * @param {String} $content     the post content
     */
    public function add($title, $intro, $content) {
        $id = 2;

        $query = 'INSERT INTO ' . self::table . '(title,intro,content,creat_date,edit_date,user_id) VALUES (:title, :intro, :content, NOW(), null, :id)';

        $q = $this->db->prepare($query);
        $q->execute(['title'=>$title, 'intro'=>$intro, 'content'=>$content, 'id'=> $id]);
    }

    /**
     * Update a post in database
     * 
     * @param {String} $title       the post title
     * @param {String} $intro       the post intro, short text
     * @param {String} $content     the post content
     * @param {Integer} $id         the id of the post to update
     */
    public function edit($title, $intro, $content, $id) {
        $query = 'UPDATE :table SET title=:title, intro=:intro, content=:content, edit_date=NOW() WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['table' => $this->table, 'title'=>$title, 'intro'=>$intro, 'content'=>$content, 'id'=> $id]);
    }

    /**
     * Get all the Post from database
     * @return {Array}
     */
    public function getPostList() {
        $query = 'SELECT * FROM :table';
        $query = 'SELECT * FROM ' . $this->table;
        
        $q = $this->db->prepare($query);
        //$q->execute(['table' => $this->table]);
        $q->execute();
        $result = $q->fetchAll(\PDO::FETCH_CLASS, Post::class);

        return $result;
    }

    /**
     * Get one post from database with id as match
     * @param {Integer}      the id of a post
     * 
     * @return {Object}
     */
    public function getPost($id) {
        $query = 'SELECT * FROM :table WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['table' => $this->table, 'id' => intval($id)]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Post::class);
        
        $result = $q->fetch();

        return $result;
    }
}