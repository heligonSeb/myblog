<?php


namespace App\controllers;

use App\models\repositories\CommentsRepository;


class CommentsController {
    public function actionAdd() {
        $user_id = 2;

        if(isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
        } else {
            throw new \Exception("Error lors du remplissage du formulaire");
            
        }

        try {
            (new CommentsRepository())->add($title, $comment, $post_id, $user_id);
        } catch (\Exception $e) {
            throw new \Exception("Error lors de l'ajout du commentaire");
        }

        header('Location: ?page=post&post='.$post_id);
    }
}