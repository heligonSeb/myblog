<?php

namespace App\models\repositories;

use App\models\entities\Post;
use App\services\database\Database;

class PostRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connexionDb();
    }

    /**
     * Insert a new post in database.
     *
     * @param string $title
     *                        Post title
     * @param string $intro
     *                        Post intro, short text
     * @param string $content
     *                        Post content
     * @param int    $id
     *                        user id
     *
     * @return void
     */
    public function add($title, $intro, $content, $id)
    {
        $query = 'INSERT INTO post(title,intro,content,creat_date,edit_date,user_id) VALUES (:title, :intro, :content, NOW(), null, :id)';

        $q = $this->db->prepare($query);
        $q->execute(['title' => $title, 'intro' => $intro, 'content' => $content, 'id' => $id]);
    }

    /**
     * Update a post in database.
     *
     * @param string $title
     *                        Post title
     * @param string $intro
     *                        Post intro, short text
     * @param string $content
     *                        Post content
     * @param int    $id
     *                        Id of the post to update
     *
     * @return void
     */
    public function edit($title, $intro, $content, $id)
    {
        $query = 'UPDATE post SET title=:title, intro=:intro, content=:content, edit_date=NOW() WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['title' => $title, 'intro' => $intro, 'content' => $content, 'id' => $id]);
    }

    /**
     * Get all the Post from database.
     *
     * @return Post[]
     */
    public function getPostList()
    {
        $query = 'SELECT * FROM post';

        $q = $this->db->prepare($query);
        $q->execute();
        $result = $q->fetchAll(\PDO::FETCH_CLASS, Post::class);

        return $result;
    }

    /**
     * Get one post from database with id as match.
     *
     * @param int $id
     *                Id of a post
     *
     * @return Post
     */
    public function getPost($id)
    {
        $query = 'SELECT * FROM post WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => intval($id)]);
        $q->setFetchMode(\PDO::FETCH_CLASS, Post::class);

        $result = $q->fetch();

        return $result;
    }

    /**
     * Delete a blog post from database.
     *
     * @param int $id
     *                Id of a post
     *
     * @return void
     */
    public function delete($id)
    {
        $query = 'DELETE FROM post WHERE id=:id';

        $q = $this->db->prepare($query);
        $q->execute(['id' => intval($id)]);
    }
}
