<?php


namespace App\controllers;

use App\models\entities\Comments;
use App\models\repositories\CommentsRepository;
use App\models\repositories\PostRepository;
use App\models\repositories\UsersRepository;

class PostController
{
    public function getList() {
        try {
            $posts = (new PostRepository())->getPostList();
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la récupération des posts"); 
        }

        include '../src/views/postList.php';
    }

    public function getPost($id) {
        try {
            $post = (new PostRepository())->getPost($id);

            try {
                $user = (new UsersRepository())->getUser($post->user_id);
            } catch (\Exception $e) {
                throw new \Exception('Error lors de la recuperation de la personne');
            }

            try {
                $comments = (new CommentsRepository())->getAllComments($post->id);
            } catch (\Exception $th) {
                throw new \Exception("Error lors de la recuperation des commentaires");
            }
        } catch (\Exception $e) {
            throw new \Exception("Error lors de la récupération d'un post");
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
}