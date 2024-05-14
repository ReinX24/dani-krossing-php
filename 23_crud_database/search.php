<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST["usersearch"];

    try {
        $pdo = require_once "includes/dbh.inc.php";

        $searchUserQuery =
            "SELECT 
                *
            FROM
                comments
            WHERE
                username
            LIKE
                :username";

        $statement = $pdo->prepare($searchUserQuery);

        // %$search% means that checks if that string is a substring of another
        // string in our database
        $statement->bindValue(":username", "%$userSearch%");

        $statement->execute();

        $searchResults = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($searchResults);
        echo "</pre>";
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>

<body>

</body>

</html>