<?php

namespace App\Controllers;
class HomeController
{
    public function index(): void
    {
        require 'views/home_view.php';
    }
}