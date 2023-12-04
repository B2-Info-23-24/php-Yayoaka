<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Models\BrandsModel;


/**
 * Brands Model
 */
class VehiclesModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getVehicles($filterBrand = null, $filterPlace = null)
    {
        $tWhere = array();
        if ($filterBrand) {
            $tWhere[] = "id_brand=" . $filterBrand;
        }
        if ($filterPlace) {
            $tWhere[] = "id_nb_place=" . $filterPlace;
        }

        // var_dump($tWhere);
        $sWheres = "";
        if (count($tWhere) > 0) {
            $sWheres = implode(" AND ", $tWhere);
            $sWheres = "WHERE " . $sWheres;
            // SELECT .... FROM .... WHERE id_brand=2 AND id_color=5 AND .... 
        }

        $queryContents = "SELECT v.id, name_model, price, description_vehicle, id_brand, id_nb_place, id_color,
                         b.name_brand, p.nb_places, c.name_color FROM vehicle v 
                         JOIN brand b ON b.id = v.id_brand
                        JOIN places p ON p.id = v.id_nb_place
                        JOIN color c ON c.id = v.id_color "
            . $sWheres . " ORDER BY name_model ASC";

        // if (count($tWhere) > 0) die($queryContents);
        $allVehicles = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $allVehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        return $allVehicles;
    }
}
