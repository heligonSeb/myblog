<?php

namespace App\controllers;

class HomeController 
{
    public function getHomePage() {
        include '../src/views/home.php';
    }
}