<?php

namespace App\Models;

use PDOException;

class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUser($name, $firstname, $admin, $nb_phone, $mail, $password)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO User (name, firstname, admin, nb_phone, mail, password)
            VALUES (:name, :firstname, :admin, :nb_phone, :mail, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':nb_phone', $nb_phone);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', md5($password));
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function getUser($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT id, name, firstname, admin, nb_phone, mail, password FROM User WHERE id = " . $id);
            $rows = $stmt->fetchAll();
            $currUser = $rows[0];
            return $currUser;
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getUserConnected()
    {
        if (!isset($_SESSION)) session_start();
        $uid = 0;
        if (isset($_SESSION['user_logged'])) {
            $uid = $_SESSION['user_logged'];
        }
        $currUser = $this->getUser($uid);
        return $currUser;
    }

    public function updUser($id, $name, $firstname, $admin, $nb_phone, $mail, $password)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE User SET name = :name, firstname = :firstname, admin = :admin, nb_phone = :nb_phone,
            mail = :mail, password = :password WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':nb_phone', $nb_phone);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', md5($password));
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function delUser($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM User WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getUserFav()
    {
        if (!isset($_SESSION)) session_start();
        $uid = 0;
        if (isset($_SESSION['user_logged'])) {
            $uid = $_SESSION['user_logged'];
        }

        try {
            $stmt = $this->pdo->query("SELECT f.id_user, f.id_vehicle, v.name_model, b.name_brand FROM Favorite f
            JOIN Vehicle v ON v.id = f.id_vehicle 
            JOIN Brand b ON b.id = v.id_brand 
            WHERE f.id_user=" . $uid);
            $tFavs = $stmt->fetchAll();
            return $tFavs;
        } catch (PDOException $e) {
            die("getUserFav : Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
