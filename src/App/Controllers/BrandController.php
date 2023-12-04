<?php

namespace App\Controllers;

class BrandController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function saveBrand()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameBrand = $_POST['nameBrand'];
            $id = $_POST['idBrand'];
            if ($id == 0) {
                $result = $this->model->addBrand($nameBrand);
            } else {
                $result = $this->model->updBrand($id, $nameBrand);
            }
            if ($result) {
                header('Location: action.php?do=brands');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre.";
            }
        }
    }
    public function delBrand()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            if ($id > 0) {
                $result = $this->model->delBrand($id);
            } else {
                echo "Erreur lors de la suppression de la marque. ID introuvable";
            }
            if ($result) {
                header('Location: action.php?do=brands');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre. Suppression impossible";
            }
        }
    }
    public function displayBrand($id)
    {
        $name = "";
        if ($id > 0) {
            $name = $this->model->getBrand($id);
        }
        require(dirname(__DIR__) . "/Views/brand.php");
    }
}
