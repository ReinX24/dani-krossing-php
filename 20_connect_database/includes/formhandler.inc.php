<?php

declare(strict_types=1);

// Checking if the user sends a form using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        $pdo = require_once "dbh.inc.php";

        $query =
            "INSERT INTO
                users (username, pwd, email)
            VALUES
                (:username, :pwd, :email)";

        $statement = $pdo->prepare($query);

        $statement->bindValue(":username", $username);
        $statement->bindValue(":pwd", $pwd);
        $statement->bindValue(":email", $email);

        $statement->execute();

        // Closing our connection and statement
        $pdo = null;
        $statement = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Sends the user back to the index page
    header("Location: ../index.php");
}
