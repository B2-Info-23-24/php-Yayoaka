<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class BrandsModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getBrands()
    {
        $queryContents = "SELECT id, name_brand FROM Brand ORDER BY name_brand ASC";

        $allBrands = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $allBrands = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        return $allBrands;
    }
}
