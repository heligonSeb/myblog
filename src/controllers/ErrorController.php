<?php 


namespace App\controllers;

class ErrorController
{
    /**
     * show the error page notFound
     */
    public function notFound() {
        $error = [
            'img' => '404.jpg',
            'alt' => 'page introuvable'
        ];

        include '../src/views/error/errorPage.php';
    }

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
}
