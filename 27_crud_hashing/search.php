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

        $pdo = null;
        $statement = null;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- For classless styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.fluid.classless.min.css" />
    <!-- For custom theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.orange.min.css" />
</head>

<body>

    <main>
        <nav>
            <ul>
                <li><strong>Users - Comments Database</strong></li>
            </ul>
            <ul>
                <li><a href="index.php">Index</a></li>
            </ul>
        </nav>

        <h2>Search Results:</h2>
        <?php if (empty($searchResults)) : ?>
            <div>
                <p>There were no results.</p>
            </div>
        <?php else : ?>
            <?php foreach ($searchResults as $comments) : ?>
                <blockquote>
                    <?= htmlspecialchars($comments["comment_text"]); ?>
                    <footer>
                        <cite>- <?= htmlspecialchars($comments["username"]); ?>
                            , <?= htmlspecialchars(date(
                                    "m-d-Y h:i:s A",
                                    strtotime($comments["created_at"])
                                )); ?>
                        </cite>
                    </footer>
                </blockquote>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
</body>

</html>