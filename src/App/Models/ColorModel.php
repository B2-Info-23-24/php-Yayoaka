<?php

namespace App\Models;

use PDOException;

class ColorModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addColor($parametre)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Color (name_color) VALUES (:parametre)");
            $stmt->bindParam(':parametre', $parametre);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function getColor($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT name_color FROM Color WHERE id = " . $id);
            $rows = $stmt->fetchAll();
            $name = $rows[0]['name_color'];
            return $name;
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function updColor($id, $name)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE Color SET name_color = :name WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function delColor($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM Color WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
