<?php


namespace App\controllers;

use App\models\repositories\UsersRepository;

class AuthController {
    /**
     * 
     */
    public function connect() {
        if(!isset($_POST['email']) && !isset($_POST['password'])) {
            $this->ErrorMessageModal('Veuillez remplir les champs du formulaire');

            
        }

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->ErrorMessageModal('Format de mail invalide');
        }

        try {
            $user = (new UsersRepository())->getUserByEmail($_POST['email']);
        } catch (\Exception $e) {
            $this->ErrorMessageModal('Votre Email ou mot de passe incorrect ');
        }

        if(!$user->checkPassword($_POST['password'])) {
            $this->ErrorMessageModal('Email ou mot de passe incorrect');
        }

        $_SESSION['user'] = $user;

        header('Location: /public');
    }

    public function addUser() {
        if(!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            throw new \Exception('Veuillez remplir les champs du formulaire');
        }

        if(!(new UsersRepository())->userExist($_POST['email'])) {
            throw new \Exception('Utilisateur déja existant');
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

    /**
     * dzada
     * @param {String}
     */
    private function ErrorMessageModal($message) {
        $_SESSION['errorMessage'] = $message;

        header('Location: /public');
    }


}