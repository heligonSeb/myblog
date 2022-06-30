<?php


namespace App\controllers;

use App\models\repositories\PostRepository;

class PostController
{
    public function list() {
        include '../src/views/postList.php';
    }

    public function getPost($id) {
        echo $id;
    }

    public function actionAdd() {
        if(isset($_POST['title']) && isset($_POST['intro']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $content = $_POST['content'];
        } else {
            throw new \Exception("Champ vide d'ajout de post");
        }

        // var_dump($_POST);
        try {
            (new PostRepository())->add($title, $intro, $content);
        } catch (\Exception $e) {
            showErrorArray($e);

            throw new \Exception("Error au niveau de l'enregistrement");
        }

        header('Location: ?page=post');
    }
}