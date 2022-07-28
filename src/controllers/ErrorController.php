<?php 


namespace App\controllers;

class ErrorController
{
    public function notFound() {
        include '../src/views/error/notFound.php';
    }

    public function system() {
        include '../src/views/error/system.php';
    }

    public function unknown() {
        include '../src/views/error/unknown.php';
    }
}