<?php
require_once '../vendor/autoload.php'; // Adapter le chemin selon votre structure

use App\Database\Database;

try {
    $db = Database::getConnection();
    echo "Connexion réussie à la base de données PostgreSQL !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
