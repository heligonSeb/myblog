<?php


namespace App\controllers;

use App\models\entities\Comments;
use App\models\repositories\CommentsRepository;
use App\models\repositories\PostRepository;
use App\models\repositories\UsersRepository;
use App\exceptions\NotFoundException;
use App\exceptions\SystemException;

class PostController
{
    public function getList() {
        $posts = (new PostRepository())->getPostList();

        if(!$posts) {
            throw new SystemException();
        }

        include '../src/views/postList.php';
    }

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

        if(!$comments) {
            throw new SystemException();
        }

        include '../src/views/post.php';
    }

    public function actionAdd() {
        if(isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
        } else {
            throw new \Exception("Champ vide d'ajout de post");
        }

        try {
            (new PostRepository())->add($title, $intro, $content);
        } catch (\Exception $e) {
            throw new \Exception("Erreur survenu lors de l'ajout d'un post");
        }

        header('Location: ?page=post');
    }

    public function actionEdit() {
        if(isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content']) && isset($_POST['post_id'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
            $id = $_POST['post_id'];
        } else {
            throw new \Exception("Champ vide dans la modification du post");
        }

        try {
            (new PostRepository())->edit($title, $intro, $content, $id);
        } catch (\Exception $e){
            showErrorArray($e);
            throw new \Exception("Erreur survenu lors de la modification du post");
        }

        header('Location: ?page=post&post='.$id);

    }
}