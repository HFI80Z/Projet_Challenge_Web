<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require __DIR__ . '/../../templates/accueil.php';
    }
}
