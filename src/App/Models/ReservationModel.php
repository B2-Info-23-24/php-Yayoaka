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

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function saveReservations($vehicle, $month, $tResaDays)
    {
        try { // TODO faire un foreach sur tResaDays pour INSERT plusieur series de date
            $stmt = $this->pdo->prepare("INSERT INTO Reservation (name_model, price, description_vehicle, id_brand, id_nb_place, id_color) 
            VALUES (:model, :price, :description, :idBrand, :idPlaces, :idColor)");
            $stmt->bindParam(':model', $model);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idBrand', $idBrand);
            $stmt->bindParam(':idPlaces', $idPlaces);
            $stmt->bindParam(':idColor', $idColor);
            // return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
