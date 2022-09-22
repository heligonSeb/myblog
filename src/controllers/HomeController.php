<?php

namespace App\controllers;

class HomeController
{
    /**
     * Show the home page.
     *
     * @return void
     */
    public function getHomePage()
    {
        include '../src/views/home.php';
    }
}
