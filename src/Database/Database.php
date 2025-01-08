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
            $host = 'db';         // Service name du container docker (défini dans docker-compose)
            $dbname = 'projet_db';
            $user = 'user';
            $pass = 'pass';
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            
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
