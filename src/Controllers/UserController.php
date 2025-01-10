<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController
{
    public function modifierCompte()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /connexion');
            exit;
        }

        $userId = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $region = $_POST['region'] ?? '';
            $email = $_POST['email'] ?? '';

            if (!empty($nom) && !empty($prenom) && !empty($region) && !empty($email)) {
                UserModel::updateUser($userId, $nom, $prenom, $region, $email);
                $_SESSION['user_prenom'] = $prenom; // Mettre à jour le prénom dans la session
                header('Location: /');
                exit;
            }
        }

        $user = UserModel::getUserById($userId);
        require __DIR__ . '/../../templates/modifier-compte.php';
    }

    // Nouvelle méthode pour afficher le profil d'un utilisateur
    public function afficherProfil()
    {
        $userId = $_GET['id'] ?? null;

        if ($userId) {
            $user = UserModel::getUserProfileById($userId);

            if ($user) {
                require __DIR__ . '/../../templates/profil.php';
                return;
            }
        }

        // Si l'utilisateur n'existe pas, afficher une erreur ou rediriger
        header('Location: /');
        exit;
    }
}
