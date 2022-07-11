<?php


namespace App\controllers;

use App\models\repositories\CommentsRepository;


class CommentsController {
    public function ActionAdd() {
        $id = 2;

        if(isset($_GET['post']) && isset($_POST['title']) && isset($_POST['comment'])) {

        } else {
            throw new \Exception("Error lors du remplissage du formulaire");
            
        }


        return false;
    }
}