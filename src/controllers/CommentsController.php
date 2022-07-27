<?php


namespace App\controllers;

use App\models\repositories\CommentsRepository;


class CommentsController {
    public function actionAdd() {
        $user = $_SESSION['user'];

        if(isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
        } else {
            throw new \Exception("Error lors du remplissage du formulaire");
            
        }

        try {
            (new CommentsRepository())->add($title, $comment, $post_id, $user);
        } catch (\Exception $e) {
            throw new \Exception("Error lors de l'ajout du commentaire");
        }

        header('Location: ?page=post&post='.$post_id);
    }

    public function validateComment() {
        if(!isset($_POST['commentId'])) {
           throw new \Exception("Erreur lors du remplissage du formulaire", 1);
        }

        try {
            (new CommentsRepository())->validate($_POST['commentId']);
        } catch (\Exception $e) {
            throw new \Exception("Erreur dans la validation du commentaire", 1);
        }

        header('Location: ?page=post&post='.$_GET['post']);
    }
}