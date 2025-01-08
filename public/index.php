<?php
session_start();

// Chargement de l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AnnonceController;
use App\Controllers\OtherController;
use App\Controllers\UserController; // Ajout du UserController

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routage minimaliste
switch ($uri) {
    case '/':
    case '/accueil':
        $controller = new HomeController();
        $controller->index();
        break;

    case '/reservation':
        $controller = new AnnonceController();
        $controller->index();
        break;

    case '/categorie':
        $controller = new OtherController();
        $controller->categorie();
        break;

    case '/connexion':
        $controller = new AuthController();
        $controller->connexion();
        break;

    case '/inscription':
        $controller = new AuthController();
        $controller->inscription();
        break;

    case '/contact':
        $controller = new OtherController();
        $controller->contact();
        break;

    // Actions spécifiques pour les annonces
    case '/ajouter-annonce':
        $controller = new AnnonceController();
        $controller->ajouterAnnonce();
        break;

    case '/modifier-annonce':
        $controller = new AnnonceController();
        $controller->modifierAnnonce();
        break;

    case '/supprimer-annonce':
        $controller = new AnnonceController();
        $controller->supprimerAnnonce();
        break;

    // Déconnexion
    case '/deconnexion':
        $controller = new AuthController();
        $controller->deconnexion();
        break;

    // Gestion du compte utilisateur
    case '/modifier-compte':
        if (isset($_SESSION['user_id'])) {
            $controller = new UserController();
            $controller->modifierCompte();
        } else {
            header('Location: /connexion');
        }
        break;

    // Page des messages utilisateur (si connecté)
    case '/messages':
        if (isset($_SESSION['user_id'])) {
            require __DIR__ . '/../templates/messages.php';
        } else {
            header('Location: /connexion');
        }
        break;

    default:
        // 404
        http_response_code(404);
        echo "404 - Page introuvable";
        break;
}
