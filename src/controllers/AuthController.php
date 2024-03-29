<?php

namespace App\controllers;

use App\models\repositories\UsersRepository;

class AuthController
{
    /**
     * Login to the website with an email and password
     * and redirect to home page.
     *
     * @return void
     */
    public function connect()
    {
        if (!isset($_POST['email']) && !isset($_POST['password'])) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Veuillez remplir les champs du formulaire',
            ];

            header('Location: ?page=login');

            return;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Format de mail invalide',
            ];

            header('Location: ?page=login');

            return;
        }

        $user = (new UsersRepository())->getUserByEmail($_POST['email']);

        if (!$user) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Votre email ou mot de passe est incorrect',
            ];

            header('Location: ?page=login');

            return;
        }

        if (!$user->checkPassword($_POST['password'])) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Votre email ou mot de passe est incorrect',
            ];

            header('Location: ?page=login');

            return;
        }

        $_SESSION['user'] = $user;
        header('Location: /');

        return;
    }

    /**
     * Add an user in database and then use the methods connect() for login to the website.
     *
     * @return void
     */
    public function addUser()
    {
        if (!isset($_POST['lastname']) || !isset($_POST['firstname']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Veuillez remplir les champs du formulaire',
            ];

            header('Location: ?page=register');

            return;
        }

        if (!(new UsersRepository())->userExist($_POST['email'])) {
            $_SESSION['message'] = [
                'color' => 'danger',
                'content' => 'Utilisateur déja existant',
            ];

            header('Location: ?page=register');

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
     * and redirect to home page.
     *
     * @return void
     */
    public function logoff()
    {
        session_unset();
        session_destroy();

        header('Location: /');

        return;
    }

    /**
     * Show the login page.
     *
     * @return void
     */
    public function getLoginPage()
    {
        include '../src/views/login.php';
    }

    /**
     * Show the login page.
     *
     * @return void
     */
    public function getRegisterPage()
    {
        include '../src/views/register.php';
    }
}
