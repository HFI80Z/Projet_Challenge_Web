<?php
namespace App\Controllers;

class OtherController
{
    public function categorie()
    {
        // Charger la vue pour la catégorie
        require __DIR__ . '/../../templates/categorie.php';
    }

    public function contact()
    {
        // Charger la vue pour la page de contact
        require __DIR__ . '/../../templates/contact.php';
    }

    public function reservation()
    {
        // Charger la vue pour la page réservation
        require __DIR__ . '/../../templates/reservation.php';
    }
}
