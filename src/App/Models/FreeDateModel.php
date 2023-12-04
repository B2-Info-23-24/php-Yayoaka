<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class FreeDateModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getFreeDates($date, $vehicle)
    {
        $queryContents = "SELECT date_begin, date_end FROM Reservation WHERE id_vehicle = " . $vehicle . " AND date_begin
        LIKE '" . $date . "%' ORDER BY date_begin ASC";

        $tFreeDates = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $tFreeDates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        // TODO algo construction table free date
        // Foreach ...

        return $tFreeDates;
    }
}
