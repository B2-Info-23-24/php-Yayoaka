<?php

namespace App\Models;

use PDOException;

class LoginModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login($name, $password)
    {
        try {
            $password = md5($password);
            $stmt = $this->pdo->query("SELECT id, admin FROM user WHERE name = '" . $name . "' AND password = '" . $password . "'");
            // echo $stmt->debugDumpParams();
            $rows = $stmt->fetchAll();
            $idUser = $rows[0]['id'];
            $admin = $rows[0]['admin'];
            session_start();
            $_SESSION['user_logged'] = $idUser; // user_logged => id user , + user_role= 0 ou 1
            $_SESSION['user_role'] = $admin;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
