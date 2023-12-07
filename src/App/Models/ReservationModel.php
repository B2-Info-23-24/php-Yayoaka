<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class ReservationModel
{
    private $pdo;
    private $modelVehicle;

    public function __construct($pdo, $modelVehicle = null)
    {
        $this->pdo = $pdo;
        $this->modelVehicle = $modelVehicle;
    }

    public function saveReservations($idVehicle, $month, $tResaDays)
    {
        // prepa data pour INSERT plusieurs series de date
        $tSeries = array();
        $numSerie = 0;
        $tSeries[$numSerie] = array();
        $i = 0;
        $prevDay = 0;
        foreach ($tResaDays as $newDay) {
            // 1er day
            if ($numSerie == 0 && $i == 0) {
                $tSeries[$numSerie][$i] = $newDay;
            } else {
                if ($prevDay + 1 == $newDay) {
                    // si suite alors on continue
                    $tSeries[$numSerie][$i] = $newDay;
                } else {
                    // sinon on change et on passe à une nouvelle série
                    $numSerie++;
                    $tSeries[$numSerie] = array();
                    $i = 0;
                    $tSeries[$numSerie][$i] = $newDay;
                }
            }

            $prevDay = $newDay;
            $i++;
        }
        //echo "<hr>tSeries: <pre>"; print_r($tSeries); echo "</pre><br />";

        // recupere le price du vehicle
        $vehicle = $this->modelVehicle->getVehicle($idVehicle);

        if (!isset($_SESSION)) {
            session_start();
        }
        $userId = $_SESSION['user_logged'];


        $tResaIds = array();
        foreach ($tSeries as $tResa) {
            echo "<br />Saving resa car #" . $idVehicle . " for " . $month . "-" . $tResa[0] . " to " . $month . "-" . end($tResa);
            $idResa = $this->saveResa($userId, $idVehicle, $vehicle['price'], $month, $tResa);
            $tResaIds[] = $idResa;
        }

        return $tResaIds;
    }

    private function saveResa($userId, $vehicle, $price, $month, $tResa)
    {
        try {
            $date1 = $month . "-" . ($tResa[0] < 10 ? "0" . $tResa[0] : $tResa[0]);
            $date2 = $month . "-" . (end($tResa) < 10 ? "0" . end($tResa) : end($tResa));

            $stmt = $this->pdo->prepare("INSERT INTO Reservation (id_user, id_vehicle, date_begin, date_end, nb_day, total_price, date_reservation) 
            VALUES (:user, :vehic, :date1, :date2, :nbdays, :totprice, :currDate)");
            $stmt->bindParam(':user', $userId);
            $stmt->bindParam(':vehic', $vehicle);
            $stmt->bindParam(':date1', $date1);
            $stmt->bindParam(':date2', $date2);
            $nbDays = count($tResa);
            $stmt->bindParam(':nbdays', $nbDays);
            $totPrice = $price * $nbDays;
            $stmt->bindParam(':totprice', $totPrice);
            $currDate = date("Y-m-d H:i:s");
            $stmt->bindParam(':currDate', $currDate);
            //$stmt->debugDumpParams();
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            die("Erreur lors de l'enregistrement de la reservation : " . $e->getMessage());
        }
    }

    public function updResasState(array $tIds, int $state)
    {
        $sIds = implode(",", $tIds);
        try {
            $stmt = $this->pdo->prepare("UPDATE Reservation SET state=:state WHERE id IN (" . $sIds . ")");
            $stmt->bindParam(':state', $state);
            // $stmt->bindParam(':ids', $sIds);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("updResasState : Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getResa($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT id, state, id_user, id_vehicle, date_begin, date_end, nb_day, total_price FROM reservation
            WHERE id=" . $id);
            $rows = $stmt->fetchAll();
            $currResa = $rows[0];
            return $currResa;
        } catch (PDOException $e) {
            die("getResa : Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getResas($tIds)
    {
        $Ids = implode(",", $tIds);
        try {
            $stmt = $this->pdo->query("SELECT id, state, id_user, id_vehicle, date_begin, date_end, nb_day, total_price FROM reservation
            WHERE id IN (" . $Ids . ")");
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            die("getResas : Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getResaByUser($userId)
    {
        if (!isset($_SESSION)) session_start();
        $uid = 0;
        if (isset($_SESSION['user_logged'])) {
            $uid = $_SESSION['user_logged'];
        }

        try {
            $stmt = $this->pdo->query("SELECT id, state, id_user, id_vehicle, date_begin, date_end, nb_day, total_price FROM reservation
            WHERE id_user=" . $uid);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            die("getResaByUser : Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
