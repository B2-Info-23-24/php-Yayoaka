<?php

namespace App\Models;

use PDOException;

class PlaceModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPlace($parametre)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Places (nb_places) VALUES (:parametre)");
            $stmt->bindParam(':parametre', $parametre);
            var_dump($stmt);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function getPlace($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT nb_places FROM Places WHERE id = " . $id);
            $rows = $stmt->fetchAll();
            $name = $rows[0]['nb_places'];
            return $name;
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function updPlace($id, $name)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE Places SET nb_places = :name WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function delPlace($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM Places WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
