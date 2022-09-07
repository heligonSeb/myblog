<?php


namespace App\controllers;

use App\exceptions\SystemException;
use App\exceptions\ForbiddenException;
use App\models\repositories\CommentsRepository;



class CommentsController {
    /**
     * Creat a comment from post
     * and redirect to the post page
     */
    public function actionAdd() {
        if(!isset($_SESSION['user'])) {
            throw new ForbiddenException();
        }

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

    /**
     * Validate an comment for can be show with the post
     * and redirect to the post page
     */
    public function validateComment() {
        if(!isset($_SESSION['user']) || $_SESSION['user']->status !== 'admin') {
            throw new ForbiddenException();
        }

        (new CommentsRepository())->validate($_POST['commentId']);


        header('Location: ?page=post&post='.$_GET['post']);
    }
}

