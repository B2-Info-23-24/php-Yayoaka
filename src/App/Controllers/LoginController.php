<?php

namespace App\Controllers;

class LoginController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * stock en session 'user_logged' = id user et 'user_role' = 0 ou 1
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nameuser'];
            $password = $_POST['password'];
            $result = $this->model->login($name, $password);
            if (!$result) {
                echo "Erreur lors du login.";
                exit();
            }
        }
    }
    public function displayHome()
    {
        header('Location:action.php?do=home');
    }
}
