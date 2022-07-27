<?php 


namespace App\controllers;

class ErrorController
{
    public function notFound() {
        echo '404';
    }

    /**
     * Return an Error message with session
     * @param {String}
     */
    public function ErrorMessage($message) {
        $_SESSION['errorMessage'] = $message;

        header('Location: /public');
    }
}