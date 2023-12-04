<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class PlacesModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPlaces()
    {
        $queryContents = "SELECT id, nb_places FROM Places ORDER BY nb_places ASC";

        $allPlaces = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $allPlaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        return $allPlaces;
    }
}
