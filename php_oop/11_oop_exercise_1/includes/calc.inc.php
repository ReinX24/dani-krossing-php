<?php

declare(strict_types=1);
require_once "autoloader.inc.php";

$num1 = (int) $_POST["num1"];
$num2 = (int) $_POST["num2"];
$operator = $_POST["operator"];

$calc = new Calc($operator, $num1, $num2);

try {
    $result = $calc->calculator();
    header("Location: ../index.php?result=$result");
} catch (TypeError $e) {
    echo "Error!: " . $e->getMessage();
}
