<?php

namespace App\Core;

use PDO;
use PDOException;

class Config
{

    public function connectDB($currentDb)
    {
        $dsn = 'mysql:dbname=' . $currentDb . ';host=localhost;port=3306';
        $user = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $user, $password);
            // var_dump($pdo);
            return $pdo;
        } catch (PDOException $e) {
            echo "fail to coonect DB";
            echo $e->getMessage();
            return null;
        }
    }
}
