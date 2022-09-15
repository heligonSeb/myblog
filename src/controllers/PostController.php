<?php


namespace App\controllers;

use App\models\repositories\{
    CommentsRepository,
    PostRepository,
    UsersRepository
};
use App\exceptions\ {
    ForbiddenException,
    NotFoundException,
    SystemException
};

class PostController
{
    /**
     * Get the list of all post
     * and show the page of all post
     * 
     * @throws SystemException
     *      If can't find a post
     */
    public function getList() 
    {
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
     * @param integer $id
     *      post id
     * 
     * @throws NotFoundException
     *      Not find the post
     * @throws SystemException
     *      Don't find the user who write the post
     */
    public function getPost($id) 
    {
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
     * Show the adding form page
     * 
     * @throws ForbiddenException
     *      If the user not exist or if user exist but it's not an admin
     *      
     */
    public function getAddPostPage() 
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        include '../src/views/addPost.php';
    }

    /**
     * Creat new post
     * and redirect to the page of all post
     * 
     * @throws ForbiddenException
     *      If the user not exist or if user exist but it's not an admin
     * @throws SystemException
     *      if the POST 'title' or 'intro' or 'content' not exist or is null
     */
    public function actionAdd() 
    {
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
     * 
     * @throws SystemException
     *      If the user not exist or if user exist but it's not an admin
     * @throws SystemException
     *      if the POST 'title' or 'intro' or 'content' or 'post_id' not exist or is null
     */
    public function actionEdit() 
    {
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
     * 
     * @param integer $id 
     *      Id of the post
     * 
     * @throws ForbiddenException
     *      If the user not exist or if user exist but it's not an admin
     * @throws NotFoundException
     *      If not find the post to edit
     */
    public function getEditPostPage($id) 
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        $post = (new PostRepository())->getPost($id);

        if(!$post) {
            throw new NotFoundException();
        }

        include '../src/views/editPost.php';
    }

    /**
     * Delete a post but delete the comment link to that post firstname
     * 
     * @param integer $id
     *      the id of a post
     * 
     * @throws ForbiddenException
     *      If the user not exist or if user exist but it's not an admin
     */
    public function actionDelete($id) 
    {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        $comments = (new CommentsRepository())->getAllComments($id);

        $_SESSION['message'] = [
            'content' => `Le blog post {$id} à bien été supprimé`,
            'color' => 'success'
        ];
        
        // after echo do :
        //unset($_SESSION['message']);

        header('Location: ?page=post');
    }
}
