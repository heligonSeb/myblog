<?php

namespace App\services\router;

use App\controllers\AuthController;
use App\controllers\HomeController;
use App\controllers\ErrorController;
use App\controllers\PostController;
use App\controllers\CommentsController;

class Router
{
    public function route($page) {
        $page = $page ? $page : 'home';

        switch ($page) {
            case 'post':
                if(isset($_GET['post'])) {
                    (new PostController())->getPost($_GET['post']);
                } else {
                    if(isset($_GET['action']) && $_GET['action'] == "add") {
                        (new PostController())->actionAdd();
                    } elseif (isset($_GET['action']) && $_GET['action'] == "addComment") {
                        (new CommentsController())->actionAdd();
                    } elseif (isset($_GET['action']) && $_GET['action'] == "editPost"){
                        (new PostController())->actionEdit();
                    }
                    else {
                        (new PostController())->getList();
                    }
                }
                break;

            case 'login':
                if(isset($_GET['action']) && $_GET['action'] == "connect") {
                    (new AuthController())->connect();
                } else {
                    (new AuthController())->addUser();
                }
                break;

            case 'home':
                (new HomeController())->getHomePage();
                break;
            
            default:
                (new ErrorController())->notFound();
                break;
        }
    }
}