<?php
namespace App\Controllers;

use App\Models\AnnonceModel;

class AnnonceController
{
    public function index()
    {
        // Page "Réservation" => lister les annonces
        $annonces = AnnonceModel::getAllAnnonces();
        require __DIR__ . '/../../templates/reservation.php';
    }

    public function ajouterAnnonce()
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
                AnnonceModel::createAnnonce($titre, $description, $prix, $user_id, $imageName);
            }
            header('Location: /reservation');
            exit;
        }

        header('Location: /reservation');
    }

    public function modifierAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;

        if ($annonceId) {
            // Récupérer les données de l'annonce sélectionnée
            $annonce = AnnonceModel::getAnnonceById($annonceId);

            if ($annonce && $annonce['user_id'] == $_SESSION['user_id']) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $titre = $_POST['titre'] ?? '';
                    $description = $_POST['description'] ?? '';
                    $prix = $_POST['prix'] ?? 0;

                    // Gestion de l'image
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        $uploadDir = __DIR__ . '/../../public/uploads/';
                        $tmpFile = $_FILES['image']['tmp_name'];
                        $originalName = $_FILES['image']['name'];
                        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                        $imageName = uniqid('img_', true) . '.' . $extension;
                        move_uploaded_file($tmpFile, $uploadDir . $imageName);
                    } else {
                        $imageName = $annonce['image'];
                    }

                    // Mettre à jour l'annonce
                    AnnonceModel::updateAnnonce($annonceId, $titre, $description, $prix, $imageName);

                    header('Location: /reservation');
                    exit;
                }

                require __DIR__ . '/../../templates/reservation.php';
                return;
            }
        }

        header('Location: /reservation');
        exit;
    }

    public function supprimerAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;
        if ($annonceId) {
            AnnonceModel::deleteAnnonce($annonceId);
        }
        header('Location: /reservation');
    }
}
