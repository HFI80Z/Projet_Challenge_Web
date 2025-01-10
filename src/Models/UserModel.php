<?php
namespace App\Models;

use App\Database\Database;
use PDO;

class UserModel
{
    public static function getUserById($id)
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateUser($id, $nom, $prenom, $region, $email)
    {
        $db = Database::getConnection();
        $sql = "UPDATE users 
                SET nom = :nom, 
                    prenom = :prenom, 
                    region = :region, 
                    email = :email 
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':region' => $region,
            ':email' => $email,
            ':id' => $id
        ]);
    }

    public static function getUserByEmail($email)
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createUser($email, $password, $nom, $prenom, $region)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO users (email, password, nom, prenom, region) 
                VALUES (:email, :password, :nom, :prenom, :region)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':region' => $region
        ]);
    }

    // Nouvelle méthode pour récupérer le profil d'un utilisateur par ID
    public static function getUserProfileById($id)
    {
        $db = Database::getConnection();
        $sql = "SELECT id, nom, prenom, region, email FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
