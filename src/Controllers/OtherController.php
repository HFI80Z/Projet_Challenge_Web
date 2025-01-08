<?php
namespace App\Controllers;

class OtherController
{
    public function categorie()
    {
        require __DIR__ . '/../../templates/categorie.php';
    }

    public function contact()
    {
        require __DIR__ . '/../../templates/contact.php';
    }
}
