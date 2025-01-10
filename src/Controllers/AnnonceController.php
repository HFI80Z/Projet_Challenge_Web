<?php
namespace App\Controllers;

use App\Models\AnnonceModel;

class AnnonceController
{
    public function index()
    {
        // Récupérer toutes les annonces depuis le modèle
        $annonces = AnnonceModel::getAllAnnonces();

        // Charger la vue accueil.php avec les annonces
        require __DIR__ . '/../../templates/accueil.php';
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

            // Rediriger vers la page d'accueil après l'ajout
            header('Location: /accueil');
            exit;
        }

        header('Location: /accueil');
    }

    public function modifierAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;

        if ($annonceId) {
            // Récupérer l'annonce par ID
            $annonce = AnnonceModel::getAnnonceById($annonceId);

            // Vérifier que l'annonce existe et que l'utilisateur connecté est le créateur
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
                        $imageName = $_POST['current_image'] ?? $annonce['image'];
                    }

                    // Mise à jour de l'annonce
                    AnnonceModel::updateAnnonce($annonceId, $titre, $description, $prix, $imageName);
                    header('Location: /accueil');
                    exit;
                }

                // Charger la vue avec les données de l'annonce
                require __DIR__ . '/../../templates/modifier-annonce.php';
                return;
            } else {
                // Rediriger si l'annonce n'existe pas ou si l'utilisateur n'est pas le créateur
                header('Location: /accueil');
                exit;
            }
        }

        // Rediriger en cas d'ID manquant
        header('Location: /accueil');
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
            $annonce = AnnonceModel::getAnnonceById($annonceId);

            // Vérifier que l'utilisateur connecté est le créateur de l'annonce
            if ($annonce && $annonce['user_id'] == $_SESSION['user_id']) {
                AnnonceModel::deleteAnnonce($annonceId);
            }
        }

        header('Location: /accueil');
    }

    public function reserverAnnonce()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $annonceId = $_GET['id'] ?? null;
        $userId = $_SESSION['user_id'];

        if ($annonceId) {
            AnnonceModel::reserverAnnonce($annonceId, $userId);
            header('Location: /reservation');
            exit;
        }

        header('Location: /accueil');
    }

    public function supprimerReservation()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $reservationId = $_GET['id'] ?? null;
        $userId = $_SESSION['user_id'];

        if ($reservationId) {
            AnnonceModel::deleteReservation($reservationId, $userId);
        }

        header('Location: /reservation');
        exit;
    }
}
