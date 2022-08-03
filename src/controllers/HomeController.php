<?php

namespace App\controllers;

class HomeController 
{
    /**
     * Show the home page
     */
    public function getHomePage() {
        include '../src/views/home.php';
    }
}