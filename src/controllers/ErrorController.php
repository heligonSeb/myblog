<?php 


namespace App\controllers;

class ErrorController
{
    /**
     * show the error page notFound
     */
    public function notFound() {
        include '../src/views/error/notFound.php';
    }

    /**
     * Show the error page system
     */
    public function system() {
        include '../src/views/error/system.php';
    }

    /**
     * Show the error page unknown
     */
    public function unknown() {
        include '../src/views/error/unknown.php';
    }
}