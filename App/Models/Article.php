<?php

namespace App\Models;
use PDO;
class Article
{
    public function getData(): array
    {
        $connection = "mysql:host=localhost;dbname=mvcdb;charset=utf8mb4;port=3306";
        $pdo = new PDO($connection, "root", "1289..//",[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->prepare("SELECT * FROM posts");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}