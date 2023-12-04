<?php

namespace App\Controllers;

use App\Models\ColorModel;


class ColorController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function saveColor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameColor = $_POST['nameColor'];
            $id = $_POST['idColor'];

            if ($id == 0) {
                $result = $this->model->addColor($nameColor);
            } else {
                $result = $this->model->updColor($id, $nameColor);
            }
            if ($result) {
                header('Location: action.php?do=colors');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre.";
            }
        }
    }
    public function delColor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            if ($id > 0) {
                $result = $this->model->delColor($id);
            } else {
                echo "Erreur lors de la suppression de la marque. ID introuvable";
            }
            if ($result) {
                header('Location: action.php?do=colors');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre. Suppression impossible";
            }
        }
    }
    public function displayColor($id)
    {
        $name = "";
        if ($id > 0) {
            $name = $this->model->getColor($id);
        }
        require(dirname(__DIR__) . "/Views/color.php");
    }
}
