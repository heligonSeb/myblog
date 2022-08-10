<?php


namespace App\controllers;

use App\models\repositories\UsersRepository;

class AuthController {
    /**
     * Login to the website with an email and password
     * and redirect to home page
     */
    public function connect() {
        if(!isset($_POST['email']) && !isset($_POST['password'])) {
            $this->errorMessage('Veuillez remplir les champs du formulaire');

            return;
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage('Format de mail invalide');

            return;
        }

        $user = (new UsersRepository())->getUserByEmail($_POST['email']);

        if(!$user) {
            $this->errorMessage('Votre email ou mot de passe incorrect');

            return;
        }

        if(!$user->checkPassword($_POST['password'])) {
            $this->errorMessage('Votre email ou mot de passe incorrect');

            return;
        } else {
            unset($_SESSION['errorMessage']);
            $_SESSION['user'] = $user;

            header('Location: /public');
        }
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

        header('Location: /public');
    }
    
    /**
     * Return an Error message with session
     * @param String    $message        the error message
     */
    function errorMessage($message) {
        $_SESSION['errorMessage'] = $message;
        
        header('Location: /public');
    }
}
