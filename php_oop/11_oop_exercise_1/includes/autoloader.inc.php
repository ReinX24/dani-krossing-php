<?php

spl_autoload_register("myAutoLoader");

function myAutoLoader($className)
{
    // HTTP_HOST: localhost
    // REQUEST_URI: /dani-krossing-php/php_oop/11_oop_exercise_1/includes/calc.inc.php
    $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

    // If currently inside includes directory, go up one dir and go to classes
    if (strpos($url, "includes") !== false) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    $extension = ".class.php";
    require_once $path . $className . $extension;
}
