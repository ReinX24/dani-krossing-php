<?php

$pdo = require_once "includes/dbh.inc.php";

$select_query = "SELECT * FROM users";

$statement = $pdo->prepare($select_query);

$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

// Closing our PDO connection and statement
$pdo = null;
$statement = null;

?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Index</title>
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

        <hr>

        <form action="search.php" method="POST">
            <label for="search">Search for user:</label>
            <input type="text" name="usersearch" placeholder="search">
            <button>Search</button>
        </form>

        <h3>Signup</h3>

        <form action="includes/formhandler.inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="email" placeholder="E-Mail">
            <button>Signup</button>
        </form>

        <hr>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created Date</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user["id"] ?></td>
                    <td><?= htmlspecialchars($user["username"]); ?></td>
                    <td><?= htmlspecialchars($user["email"]); ?></td>
                    <td><?= htmlspecialchars($user["pwd"]); ?></td>
                    <td><?= $user["created_at"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </main>
</body>

</html>