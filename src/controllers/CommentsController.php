<?php

namespace App\controllers;

use App\exceptions\ForbiddenException;
use App\exceptions\SystemException;
use App\models\repositories\CommentsRepository;

class CommentsController
{
    /**
     * Creat a comment from post
     * and redirect to the post page.
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If it's not a user
     * @throws SystemException
     *                            If the field 'title' et 'comment' et 'post_id' not exist or null
     */
    public function actionAdd()
    {
        if (!isset($_SESSION['user'])) {
            throw new ForbiddenException();
        }

        $user = $_SESSION['user'];

        if (isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['post_id'])) {
            $post_id = $_POST['post_id'];
            $title = $_POST['title'];
            $comment = $_POST['comment'];
        } else {
            throw new SystemException();
        }

        (new CommentsRepository())->add($title, $comment, $post_id, $user);

        $_SESSION['message'] = [
            'color' => 'success',
            'content' => 'Commentaire ajouté.',
        ];

        header('Location: ?page=post&post='.$post_id);

        return;
    }

    /**
     * Validate an comment for can be show with the post
     * and redirect to the post page.
     *
     * @return void
     *
     * @throws ForbiddenException
     *                            If the user not exist or if user exist but it's not an admin
     */
    public function validateComment()
    {
        if (!isset($_SESSION['user']) || 'admin' !== $_SESSION['user']->status) {
            throw new ForbiddenException();
        }

        (new CommentsRepository())->validate($_POST['commentId']);

        header('Location: ?page=post&post='.$_GET['post']);

        return;
    }
}
