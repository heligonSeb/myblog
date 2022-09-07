<?php 


namespace App\controllers;

class ErrorController
{
    /**
     * Show the error page system
     */
    public function system() {
        $error = [
            'img' => 'system.jpg',
            'alt' => 'erreur système'
        ];

        include '../src/views/error/errorPage.php';
    }

    /**
     * Show the error page unknown
     */
    public function unknown() {
        $error = [
            'img' => 'unknown.jpg',
            'alt' => 'erreur inconnue'
        ];

        include '../src/views/error/errorPage.php';
    }

    /**
     * Show the error page forbidden
     */
    public function forbidden() {
        $error = [
            'img' => '403.jpg',
            'alt' => 'page non authorisée'
        ];

        include '../src/views/error/errorPage.php';
    }

    public function showError($error) {
        include '../src/views/error/errorPage.php';
    }
}
