<?php

namespace App\Controllers;

class VehicleController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function saveVehicle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameVehicle = $_POST['nameVehicle'];
            $id = $_POST['idVehicle'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $idBrand = $_POST['brand'];
            $idPlaces = $_POST['places'];
            $idColor = $_POST['color'];
            if ($id == 0) {
                $result = $this->model->addVehicle($nameVehicle, $price, $description, $idBrand, $idPlaces, $idColor);
            } else {
                $result = $this->model->updVehicle($id, $nameVehicle, $price, $description, $idBrand, $idPlaces, $idColor);
            }
            if ($result) {
                header('Location: action.php?do=vehicles');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre.";
            }
        }
    }
    public function delVehicle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            if ($id > 0) {
                $result = $this->model->delVehicle($id);
            } else {
                echo "Erreur lors de la suppression de la marque. ID introuvable";
            }
            if ($result) {
                header('Location: action.php?do=vehicles');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre. Suppression impossible";
            }
        }
    }
    public function displayVehicle($id)
    {
        $currVehic = array();
        $currVehic['id'] = 0;
        $currVehic['name_model'] = "";
        $currVehic['price'] = 0;
        $currVehic['description_vehicle'] = "";
        if ($id > 0) {
            $currVehic = $this->model->getVehicle($id);
        }
        $tBrands = $this->model->getBrands();
        $tPlaces = $this->model->getplaces();
        $tColors = $this->model->getColors();

        require(dirname(__DIR__) . "/Views/vehicleBO.php");
    }
    public function displayVehicleFront($id)
    {
        $currVehic = array();
        if ($id > 0) {
            $currVehic = $this->model->getVehicle($id);
        } else {
            echo "Error vehicle #" . $id . " not found";
            return;
        }

        require(dirname(__DIR__) . "/Views/vehicle.php");
    }
}
