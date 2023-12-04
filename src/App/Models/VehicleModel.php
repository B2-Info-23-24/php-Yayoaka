<?php

namespace App\Models;

use PDOException;
use PDO;

class VehicleModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addVehicle($model, $price, $description, $idBrand, $idPlaces, $idColor)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Vehicle (name_model, price, description_vehicle, id_brand, id_nb_place, id_color) 
            VALUES (:model, :price, :description, :idBrand, :idPlaces, :idColor)");
            $stmt->bindParam(':model', $model);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idBrand', $idBrand);
            $stmt->bindParam(':idPlaces', $idPlaces);
            $stmt->bindParam(':idColor', $idColor);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getVehicle($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT v.id, name_model, price, description_vehicle, id_brand, id_nb_place, id_color,
            b.name_brand, p.nb_places, c.name_color FROM vehicle v 
            JOIN brand b ON b.id = v.id_brand
           JOIN places p ON p.id = v.id_nb_place
           JOIN color c ON c.id = v.id_color WHERE v.id = " . $id);
            $rows = $stmt->fetchAll();
            $currVehic = $rows[0];
            return $currVehic;
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function updVehicle($id, $model, $price, $description, $idBrand, $idPlaces, $idColor)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE Vehicle SET name_model = :model, price = :price, description_vehicle = :description, 
            id_brand = :idBrand, id_nb_place = :idPlaces, id_color = :idColor WHERE id = :id");
            $stmt->bindParam(':model', $model);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idBrand', $idBrand);
            $stmt->bindParam(':idPlaces', $idPlaces);
            $stmt->bindParam(':idColor', $idColor);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function delVehicle($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM Vehicle WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getBrands()
    {
        $modelBrands = new BrandsModel($this->pdo);
        $tBrands = $modelBrands->getBrands();
        return $tBrands;
    }

    public function getColors()
    {
        $modelColors = new ColorsModel($this->pdo);
        $tColors = $modelColors->getColors();
        return $tColors;
    }

    public function getPlaces()
    {
        $modelPlaces = new PlacesModel($this->pdo);
        $tPlaces = $modelPlaces->getPlaces();
        return $tPlaces;
    }
}
