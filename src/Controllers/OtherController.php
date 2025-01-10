<?php
namespace App\Controllers;

class OtherController
{
    // Fonctionnalité pour créer une annonce
    public function creerAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $prix = $_POST['prix'] ?? 0;
            $user_id = $_SESSION['user_id'];

            // Gestion de l'image
            $imageName = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                $tmpFile = $_FILES['image']['tmp_name'];
                $originalName = $_FILES['image']['name'];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $imageName = uniqid('img_', true) . '.' . $extension;
                move_uploaded_file($tmpFile, $uploadDir . $imageName);
            }

            if (!empty($titre) && !empty($description)) {
                \App\Models\AnnonceModel::createAnnonce($titre, $description, $prix, $user_id, $imageName);
            }

            // Rediriger vers la page d'accueil après l'ajout
            header('Location: /accueil');
            exit;
        }

        // Charger la vue de création d'annonce
        require __DIR__ . '/../../templates/creer-annonce.php';
    }

    // Page de réservation
    public function reservation()
    {
        require __DIR__ . '/../../templates/reservation.php';
    }

    // Page de contact
    public function contact()
    {
        require __DIR__ . '/../../templates/contact.php';
    }

    // Ancienne fonctionnalité pour la catégorie (si toujours utilisée)
    public function creerAnnonces()
    {
        // Charger une vue si nécessaire ou rediriger ailleurs
        require __DIR__ . '/../../templates/creer-annonce.php';
    }
}
