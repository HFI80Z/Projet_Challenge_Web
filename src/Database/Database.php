<?php
namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            $host = 'db';         // Service name défini dans docker-compose
            $dbname = 'todolist'; // Nom de la base de données PostgreSQL
            $user = 'postgres';   // Nom d'utilisateur PostgreSQL
            $pass = 'password';   // Mot de passe PostgreSQL
            $dsn = "pgsql:host=$host;port=5432;dbname=$dbname";

            try {
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
