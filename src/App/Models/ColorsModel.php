<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class ColorsModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getColors()
    {
        $queryContents = "SELECT id, name_color FROM Color ORDER BY name_color ASC";

        $allColor = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $allColor = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        return $allColor;
    }
}
