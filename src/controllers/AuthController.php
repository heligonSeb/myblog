<?php


namespace App\controllers;

use App\models\repositories\UsersRepository;
use App\controllers\ErrorController;

class AuthController {
    /**
     * 
     */
    public function connect() {
        if(!isset($_POST['email']) && !isset($_POST['password'])) {
            (new ErrorController())->ErrorMessage('Veuillez remplir les champs du formulaire');
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            (new ErrorController())->ErrorMessage('Format de mail invalide');
        }

        try {
            $user = (new UsersRepository())->getUserByEmail($_POST['email']);
        } catch (\Exception $e) {
            (new ErrorController())->ErrorMessage('Votre Email ou mot de passe incorrect ');
        }

        if(!$user->checkPassword($_POST['password'])) {
            (new ErrorController())->ErrorMessage('Votre email ou mot de passe incorrect');
        }

        $_SESSION['user'] = $user;

        header('Location: /public');
    }

    public function addUser() {
        if(!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            (new ErrorController())->ErrorMessage('Veuillez remplir les champs du formulaire');
        }

        if(!(new UsersRepository())->userExist($_POST['email'])) {
            (new ErrorController())->ErrorMessage('Utilisateur déja existant');
        }

        try {
            (new UsersRepository())->add(
                $_POST['lastname'],
                $_POST['firstname'],
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_DEFAULT)
            );
        } catch (\Exception $e) {
            throw new \Exception("Problème à l'enregistrement");
        }

        $this->connect();
    }
}