<?php


namespace App\controllers;

use App\models\repositories\UsersRepository;

class AuthController {
    /**
     * Login to the website with an email and password
     * and redirect to home page
     */
    public function connect() {
        $message = null;

        if(!isset($_POST['email']) && !isset($_POST['password'])) {
            $message = 'Veuillez remplir les champs du formulaire';
            
            return include '../src/views/login.php';
        }
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = 'Format de mail invalide';

            return include '../src/views/login.php';
        }

        $user = (new UsersRepository())->getUserByEmail($_POST['email']);
        
        if(!$user) {
            $message = 'Votre email ou mot de passe incorrect';

            return include '../src/views/login.php';
        }

        if(!$user->checkPassword($_POST['password'])) {
            $message = 'Votre email ou mot de passe incorrect';

            return include '../src/views/login.php';
        } 

        $_SESSION['user'] = $user;
        header('Location: /');
    }

    /**
     * Add an user in database and then use the methods connect() for login to the website
     */
    public function addUser() {
        if(!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            $this->errorMessage('Veuillez remplir les champs du formulaire');

            return;
        }

        if(!(new UsersRepository())->userExist($_POST['email'])) {
            $this->errorMessage('Utilisateur déja existant');

            return;
        }

        (new UsersRepository())->add(
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        );

        $this->connect();
    }

    /**
     * Logoff to the website
     * and redirect to home page
     */
    public function logoff() {
        session_unset();
        session_destroy();

        header('Location: /');
    }
    
    /**
     * Return an Error message with session
     * @param String    $message        the error message
     */
    public function errorMessage($message) {
        header('Location: /login?error='.urlencode($message));
    }

    /**
     * Show the login page
     */
    public function getLoginPage() {
        include '../src/views/login.php';
    }

    /**
     * Show the login page
     */
    public function getRegisterPage() {
        include '../src/views/register.php';
    }
}
