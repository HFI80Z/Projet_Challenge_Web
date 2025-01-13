<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AnnonceController;
use App\Controllers\OtherController;
use App\Controllers\UserController; 

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routage minimaliste
switch ($uri) {
    case '/':
    case '/accueil': 
        $controller = new AnnonceController(); 
        $controller->index();
        break;

    case '/reservation': 
        $controller = new OtherController();
        $controller->reservation();
        break;

    case '/creer-annonce': 
        $controller = new OtherController();
        $controller->creerAnnonce();
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

    case '/reserver-annonce': 
        $controller = new AnnonceController();
        $controller->reserverAnnonce();
        break;

    case '/supprimer-reservation': 
        $controller = new AnnonceController();
        $controller->supprimerReservation();
        break;

    case '/profil': 
        $controller = new UserController();
        $controller->afficherProfil();
        break;

    case '/deconnexion':
        $controller = new AuthController();
        $controller->deconnexion();
        break;

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
        // 404 - Page introuvable
        http_response_code(404);
        echo "Rayane nique tes morts stp merci";
        break;
}
