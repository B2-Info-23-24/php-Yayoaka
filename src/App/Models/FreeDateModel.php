<?php

namespace App\Models;

use PDO;
use DateTime;
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

    public function getNotFreeDates($date, $vehicle)
    {
        $queryContents = "SELECT date_begin, date_end FROM Reservation WHERE id_vehicle = " . $vehicle . " AND date_begin
        LIKE '" . $date . "%' ORDER BY date_begin ASC";

        $tNotFreeDates = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            // $stmt->debugDumpParams();
            $tNotFreeDates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
        $tResaMonth = array();
        // TODO algo construction table free date
        foreach ($tNotFreeDates as $date) {
            $dtDate1 = DateTime::createFromFormat('Y-m-d', $date["date_begin"]);
            $sDate1 = $dtDate1->format("j");

            $dtDate2 = DateTime::createFromFormat('Y-m-d', $date["date_end"]);
            $sDate2 = $dtDate2->format("j");

            for ($i = $sDate1; $i <= $sDate2; $i++) {
                $tResaMonth[] = $i;
            }
        }

        return $tResaMonth;
    }
}
