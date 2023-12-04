<?php

namespace App\Models;

use PDOException;

class BrandModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addBrand($parametre)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Brand (name_brand) VALUES (:parametre)");
            $stmt->bindParam(':parametre', $parametre);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function getBrand($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT name_brand FROM Brand WHERE id = " . $id);
            $rows = $stmt->fetchAll();
            $name = $rows[0]['name_brand'];
            return $name;
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

    public function updBrand($id, $name)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE Brand SET name_brand = :name WHERE id = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function delBrand($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM Brand WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
