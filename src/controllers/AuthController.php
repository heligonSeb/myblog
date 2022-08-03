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
            ErrorMessage('Veuillez remplir les champs du formulaire');
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            ErrorMessage('Format de mail invalide');
        }

        $user = (new UsersRepository())->getUserByEmail($_POST['email']);

        if(!$user) {
            ErrorMessage('Votre email ou mot de passe incorrect');
        }

        if(!$user->checkPassword($_POST['password'])) {
            ErrorMessage('Votre email ou mot de passe incorrect');
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
            ErrorMessage('Veuillez remplir les champs du formulaire');
        }

        if(!(new UsersRepository())->userExist($_POST['email'])) {
            ErrorMessage('Utilisateur déja existant');
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
}