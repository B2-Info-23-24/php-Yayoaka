<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class FavModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function AddFav($idVehicle)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $userId = $_SESSION['user_logged'];
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Favorite (id_user, id_vehicle) VALUES (:user, :vehic)");
            $stmt->bindParam(':user', $userId);
            $stmt->bindParam(':vehic', $idVehicle);
            //$stmt->debugDumpParams();
            $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'enregistrement de la reservation : " . $e->getMessage());
        }
    }
}
