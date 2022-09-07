<?php

namespace App\services\router;

use App\controllers\AuthController;
use App\controllers\HomeController;
use App\controllers\ErrorController;
use App\controllers\PostController;
use App\controllers\CommentsController;
use App\controllers\ContactController;
use App\exceptions\NotFoundException;

class Router
{
    public function route($page) {
        $page = $page ? $page : 'home';

        if(!isset($_GET['action'])) {
            $_GET['action'] = '';
        }

        switch ($page) {
            case 'post':
                if(isset($_GET['post'])) {
                    switch ($_GET['action']) {
                        case 'validatecomment':
                            (new CommentsController())->validateComment();
                            break;

                        case 'editpostform':
                            (new PostController())->getEditPostPage($_GET['post']);
                            break;
                        
                        default:
                            (new PostController())->getPost($_GET['post']);
                            break;
                    }
                } else {
                    switch ($_GET['action']) {
                        case 'add':
                            (new PostController())->actionAdd();
                            break;

                        case 'addpostform':
                            (new PostController())->getAddPostPage();
                            break;

                        case 'addComment':
                            (new CommentsController())->actionAdd();
                            break;

                        case 'editPost':
                            (new PostController())->actionEdit();
                            break;
                        
                        default:
                            (new PostController())->getList();
                            break;
                    }
                }
                break;

            case 'login':
                switch ($_GET['action']) {
                    case 'connect':
                        (new AuthController())->connect();
                        break;

                    case 'addUser':
                        (new AuthController())->addUser();
                        break;

                    case 'logoff':
                        (new AuthController())->logoff();
                        break;
                    
                    default:
                        (new AuthController())->getLoginPage();
                        break;
                }
                break;

            case 'register':
                    (new AuthController())->getRegisterPage();
                break;

            case 'home':
                (new HomeController())->getHomePage();
                break;

            case 'sendmail': 
                (new ContactController())->send();
                break;
            
            default:
                throw new NotFoundException();
                break;
        }
    }
}
