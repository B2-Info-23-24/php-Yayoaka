<?php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Brands Model
 */
class UsersModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUsers()
    {
        $queryContents = "SELECT id, name, firstname, admin, nb_phone, mail, password FROM User ORDER BY name ASC";

        $allUsers = array();

        try {
            $stmt = $this->pdo->query($queryContents);
            $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }

        return $allUsers;
    }
}
