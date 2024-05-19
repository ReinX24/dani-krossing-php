<?php

$host = "localhost";
$db_name = "login_system_dk";
$db_username = "root";
$db_password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db_name;",
        $db_username,
        $db_password
    );
    // Enable error reporting for PDO object
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
