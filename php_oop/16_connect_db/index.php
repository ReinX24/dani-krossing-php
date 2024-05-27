<?php
require_once "includes/class-autoload.inc.php";

$database = new Database();

$pdo = $database->connect();

$query = "SELECT * FROM posts";

$statement = $pdo->prepare($query);

$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($results);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>16 - Connect to a Database</title>
</head>

<body>

</body>

</html>