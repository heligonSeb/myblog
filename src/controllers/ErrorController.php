<?php

namespace App\controllers;

use App\exceptions\AppException;

class ErrorController
{
    /**
     * Show the erreur with the good informations.
     *
     * @param AppException $error
     *
     * @return void
     */
    public function showError($error)
    {
        include '../src/views/error/errorPage.php';
    }
}
