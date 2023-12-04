<?php

namespace App\Controllers;

use App\Models\PlaceModel;


class PlaceController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function savePlace()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nbPlace = $_POST['nbPlace'];
            $id = $_POST['idPlace'];
            if ($id == 0) {
                $result = $this->model->addPlace($nbPlace);
            } else {
                $result = $this->model->updPlace($id, $nbPlace);
            }
            if ($result) {
                header('Location: action.php?do=places');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre.";
            }
        }
    }
    public function delPlace()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            if ($id > 0) {
                $result = $this->model->delPlace($id);
            } else {
                echo "Erreur lors de la suppression de la marque. ID introuvable";
            }
            if ($result) {
                header('Location: action.php?do=places');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre. Suppression impossible";
            }
        }
    }
    public function displayPlace($id)
    {
        $name = "";
        if ($id > 0) {
            $name = $this->model->getPlace($id);
        }
        require(dirname(__DIR__) . "/Views/place.php");
    }
}
