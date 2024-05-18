<?php

declare(strict_types=1);

// Checking if the user sends a form using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwdSignup = $_POST["pwd"];
    $id = $_POST["id"];

    try {
        $pdo = require_once "dbh.inc.php";

        $query =
            "DELETE FROM
                users
            WHERE
                username = :username
            AND
                pwd = :pwd
            AND
                id = :id";

        $statement = $pdo->prepare($query);

        $statement->bindValue(":username", $username);
        $statement->bindValue(":pwd", $pwdSignup);
        $statement->bindValue(":id", $id);

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
