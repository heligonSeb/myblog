<?php

namespace App\services\router;

use App\controllers\HomeController;
use App\controllers\ErrorController;
use App\controllers\PostController;

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
                    } else {
                        (new PostController())->list();
                    }
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