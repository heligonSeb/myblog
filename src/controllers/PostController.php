<?php

namespace App\controllers;

use App\exceptions\ForbiddenException;
use App\exceptions\NotFoundException;
use App\exceptions\SystemException;
use App\models\repositories\CommentsRepository;
use App\models\repositories\PostRepository;
use App\models\repositories\UsersRepository;

class PostController
{
    /**
     * Get the list of all post
     * and show the page of all post.
     *
     * @return void
     */
    public function getList()
    {
        $posts = (new PostRepository())->getPostList();

        if (!$posts) {
            $_SESSION['message'] = [
                'color' => 'info',
                'content' => 'Aucun post réalisé pour le moment.',
            ];
        }

        include '../src/views/postList.php';
    }

    /**
     * Get a post with an id
     * and show the page of the post.
     *
     * @param int $id
     *                post id
     *
     * @return void
     *
     * @throws NotFoundException
     *                           Not find the post
     * @throws SystemException
     *                           Don't find the user who write the post
     */
    public function getPost($id)
    {
        $post = (new PostRepository())->getPost($id);

        if (!$post) {
            throw new NotFoundException();
        }

        $user = (new UsersRepository())->getUser($post->user_id);

        if (!$user) {
            throw new SystemException();
        }

        $comments = (new CommentsRepository())->getAllComments($post->id);

        include '../src/views/post.php';
    }

    /**
     * Show the adding form page.
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If the user not exist or if user exist but it's not an admin
     */
    public function getAddPostPage()
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        include '../src/views/addPost.php';
    }

    /**
     * Creat new post
     * and redirect to the page of all post.
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If the user not exist or if user exist but it's not an admin
     * @throws SystemException
     *                            if the POST 'title' or 'intro' or 'content' not exist or is null
     */
    public function actionAdd()
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        if (isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
        } else {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Remplir tous les champs du formulaire.',
            ];

            header('Location: ?page=post&action=addpostform');
        }

        (new PostRepository())->add($title, $intro, $content, $_SESSION['user']->id);

        $_SESSION['message'] = [
            'color' => 'success',
            'content' => `Votre post "'. $title .'" a bien été créé.`,
        ];

        header('Location: ?page=post');
    }

    /**
     * Edit a post
     * and redirect the page of a post.
     *
     * @return void
     *
     * @throws SystemException
     *                         If the user not exist or if user exist but it's not an admin
     * @throws SystemException
     *                         if the POST 'title' or 'intro' or 'content' or 'post_id' not exist or is null
     */
    public function actionEdit()
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        if (isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content']) && isset($_POST['post_id'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
            $id = $_POST['post_id'];
        } else {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Remplir tous les champs du formulaire',
            ];

            header('Location: ?page=post&action=editpostform&post='.$_POST['post_id']);
        }

        (new PostRepository())->edit($title, $intro, $content, $id);

        $_SESSION['message'] = [
            'color' => 'success',
            'content' => 'Le post "'.$title.'" à bien été modifié',
        ];

        header('Location: ?page=post&post='.$id);
    }

    /**
     * Show the edit post page.
     *
     * @param int $id
     *                Id of the post
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If the user not exist or if user exist but it's not an admin
     * @throws NotFoundException
     *                            If not find the post to edit
     */
    public function getEditPostPage($id)
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        $post = (new PostRepository())->getPost($id);

        if (!$post) {
            throw new NotFoundException();
        }

        include '../src/views/editPost.php';
    }

    /**
     * Delete a post but delete the comment link to that post firstname.
     *
     * @param int $id
     *                the id of a post
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If the user not exist or if user exist but it's not an admin
     */
    public function actionDelete($id)
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        (new CommentsRepository())->deleteList($id);
        (new PostRepository())->delete($id);

        $_SESSION['message'] = [
            'content' => 'Le blog post à bien été supprimé',
            'color' => 'success',
        ];

        header('Location: ?page=post');
    }
}
