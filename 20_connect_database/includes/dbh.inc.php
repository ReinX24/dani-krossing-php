<?php

declare(strict_types=1);

$dataSourceName = "mysql:host=localhost;dbname=myfirstdatabase";
$dbUsername = "root";
$dbPassword = "";

try {
    $pdo = new PDO($dataSourceName, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
