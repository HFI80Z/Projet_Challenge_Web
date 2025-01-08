<?php
namespace App\Models;

use App\Database\Database;
use PDO;

class AnnonceModel
{
    public static function getAllAnnonces()
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM annonces ORDER BY created_at DESC";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function createAnnonce($titre, $description, $prix, $user_id, $image = null)
    {
        $db = Database::getConnection();
        $sql = "INSERT INTO annonces (titre, description, prix, user_id, created_at, image) 
                VALUES (:titre, :description, :prix, :user_id, NOW(), :image)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':titre' => $titre,
            ':description' => $description,
            ':prix' => $prix,
            ':user_id' => $user_id,
            ':image' => $image
        ]);
    }

    public static function getAnnonceById($id)
    {
        $db = Database::getConnection();
        $sql = "SELECT * FROM annonces WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateAnnonce($id, $titre, $description, $prix, $image = null)
    {
        $db = Database::getConnection();

        if ($image !== null) {
            $sql = "UPDATE annonces 
                    SET titre = :titre, 
                        description = :description, 
                        prix = :prix,
                        image = :image
                    WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':titre' => $titre,
                ':description' => $description,
                ':prix' => $prix,
                ':image' => $image,
                ':id' => $id
            ]);
        } else {
            $sql = "UPDATE annonces 
                    SET titre = :titre, 
                        description = :description, 
                        prix = :prix
                    WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':titre' => $titre,
                ':description' => $description,
                ':prix' => $prix,
                ':id' => $id
            ]);
        }
    }

    public static function deleteAnnonce($id)
    {
        $db = Database::getConnection();
        $sql = "DELETE FROM annonces WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
