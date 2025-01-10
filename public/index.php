<?php
session_start();

// Chargement de l'autoload de Composer
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AnnonceController;
use App\Controllers\OtherController;
use App\Controllers\UserController; // Ajout du UserController

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routage minimaliste
switch ($uri) {
    case '/':
    case '/accueil': // La page d'accueil affiche les annonces
        $controller = new AnnonceController(); // Utilise AnnonceController pour afficher les annonces
        $controller->index();
        break;

    case '/reservation': // Page des réservations
        $controller = new OtherController();
        $controller->reservation();
        break;

    case '/creer-annonce': // Nouvelle page pour créer une annonce
        $controller = new OtherController();
        $controller->creerAnnonce();
        break;

    case '/connexion': // Page de connexion
        $controller = new AuthController();
        $controller->connexion();
        break;

    case '/inscription': // Page d'inscription
        $controller = new AuthController();
        $controller->inscription();
        break;

    case '/contact': // Page de contact
        $controller = new OtherController();
        $controller->contact();
        break;

    // Actions spécifiques pour les annonces
    case '/ajouter-annonce': // Ajouter une annonce
        $controller = new AnnonceController();
        $controller->ajouterAnnonce();
        break;

    case '/modifier-annonce': // Modifier une annonce
        $controller = new AnnonceController();
        $controller->modifierAnnonce();
        break;

    case '/supprimer-annonce': // Supprimer une annonce
        $controller = new AnnonceController();
        $controller->supprimerAnnonce();
        break;

    case '/reserver-annonce': // Réserver une annonce
        $controller = new AnnonceController();
        $controller->reserverAnnonce();
        break;

    case '/supprimer-reservation': // Supprimer une réservation
        $controller = new AnnonceController();
        $controller->supprimerReservation();
        break;

    case '/profil': // Nouvelle route pour afficher le profil d'un utilisateur
        $controller = new UserController();
        $controller->afficherProfil();
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
        // 404 - Page introuvable
        http_response_code(404);
        echo "404 - Page introuvable";
        break;
}
