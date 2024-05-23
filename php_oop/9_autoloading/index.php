<?php

declare(strict_types=1);
require_once "includes/autoloader.inc.php";

use Person\Person;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    try {
        $person_one = new Person("Rein", 20);
        $person_one->setName("Rain");
        echo $person_one->getName();
    } catch (TypeError $e) {
        echo "Error: " . $e->getMessage();
    }
    // $person_one = new Person\Person("Rein", 20);
    // echo $person_one->getPerson();

    // echo "<br>";

    // $house_one = new House("Johndoeroad", 12);
    // echo $house_one->getAddress();
    ?>

</body>

</html>