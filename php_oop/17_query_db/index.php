<?php
require_once "includes/class-autoload.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17 - Connect to a Database</title>
</head>

<body>
    <?php
    $testObj = new Test();
    // $testObj->getUsers();
    $testObj->getUsersStmt("Daniel", "Nielsen");
    ?>
</body>

</html>