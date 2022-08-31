<?php


namespace App\controllers;

use App\exceptions\ForbiddenException;
use App\models\repositories\CommentsRepository;
use App\models\repositories\PostRepository;
use App\models\repositories\UsersRepository;
use App\exceptions\NotFoundException;
use App\exceptions\SystemException;

class PostController
{
    /**
     * Get the list of all post
     * and show the page of all post
     */
    public function getList() {
        $posts = (new PostRepository())->getPostList();

        if(!$posts) {
            throw new SystemException();
        }

        include '../src/views/postList.php';
    }

    /**
     * Get a post with an id
     * and show the page of the post
     * 
     * @param {integer} $id     post id
     */
    public function getPost($id) {
        $post = (new PostRepository())->getPost($id);

        if(!$post) {
            throw new NotFoundException();
        }

        
        $user = (new UsersRepository())->getUser($post->user_id);

        if(!$user) {
            throw new SystemException();
        }

        $comments = (new CommentsRepository())->getAllComments($post->id);

        include '../src/views/post.php';
    }

    /**
     * show the adding form page
     */
    public function getAddPostPage() {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        include '../src/views/addPost.php';
    }

    /**
     * Creat new post
     * and redirect to the page of all post
     */
    public function actionAdd() {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }
        
        if(isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
        } else {
            throw new SystemException();
        }

        (new PostRepository())->add($title, $intro, $content);

        header('Location: ?page=post');
    }

    /**
     * Edit a post 
     * and redirect the page of a post
     */
    public function actionEdit() {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }
        
        if(isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content']) && isset($_POST['post_id'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
            $id = $_POST['post_id'];
        } else {
            throw new SystemException();  
        }

        (new PostRepository())->edit($title, $intro, $content, $id);

        header('Location: ?page=post&post='.$id);
    }

    /**
     * Show the edit post page
     */
    public function getEditPostPage($id) {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        $post = (new PostRepository())->getPost($id);

        if(!$post) {
            throw new NotFoundException();
        }


        include '../src/views/editPost.php';
    }
}
