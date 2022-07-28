<?php


namespace App\controllers;

use App\exceptions\SystemException;
use App\models\repositories\CommentsRepository;



class CommentsController {
    public function actionAdd() {
        $user = $_SESSION['user'];

        if(isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
        } else {
            throw new SystemException();      
        }


        (new CommentsRepository())->add($title, $comment, $post_id, $user);


        header('Location: ?page=post&post='.$post_id);
    }

    public function validateComment() {
        if(!isset($_POST['commentId'])) {
            throw new SystemException(); /** TRICHE ERROR */
        }

        (new CommentsRepository())->validate($_POST['commentId']);


        header('Location: ?page=post&post='.$_GET['post']);
    }
}