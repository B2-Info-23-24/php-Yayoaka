<?php

namespace App\Controllers;

class UserController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function saveUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameUser = $_POST['nameUser'];
            $id = $_POST['idUser'];
            $admin = $_POST['admin'];
            $firstname = $_POST['firstname'];
            $nb_phone = $_POST['nb_phone'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            if ($id == 0) {
                $result = $this->model->addUser($nameUser, $firstname, $admin, $nb_phone, $mail, $password);
            } else {
                $result = $this->model->updUser($id, $nameUser, $firstname, $admin, $nb_phone, $mail, $password);
            }
            if ($result) {
                header('Location: action.php?do=users');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre.";
            }
        }
    }
    public function delUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            if ($id > 0) {
                $result = $this->model->delUser($id);
            } else {
                echo "Erreur lors de la suppression de la marque. ID introuvable";
            }
            if ($result) {
                header('Location: action.php?do=users');
                exit();
            } else {
                echo "Erreur lors de l'ajout du paramètre. Suppression impossible";
            }
        }
    }
    public function displayUser($id)
    {
        $currUser = array();
        $currUser['id'] = 0;
        $currUser['name'] = "";
        $currUser['firstname'] = "";
        $currUser['admin'] = 0;
        $currUser['nb_phone'] = "";
        $currUser['mail'] = "";
        $currUser['password'] = "";
        if ($id > 0) {
            $currUser = $this->model->getUser($id);
        }
        require(dirname(__DIR__) . "/Views/userBO.php");
    }

    public function getUserFav()
    {
        $tFavs = $this->model->getUserFav();
        return $tFavs;
    }

    public function displayUserFront($tMyResas, $tMyFav)
    {
        $currUser = array();
        $currUser = $this->model->getUserConnected();

        require(dirname(__DIR__) . "/Views/user.php");
    }
}
