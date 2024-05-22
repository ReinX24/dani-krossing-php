<?php

// Autoloading classes that are used in our PHP script
spl_autoload_register("myAutoLoader");

function myAutoLoader($className)
{
    $path = "classes/";
    $extension = ".class.php";
    $full_path = $path . $className . $extension;

    // Checking if the file exists
    if (!file_exists($full_path)) {
        return false; // terminates the script
    }

    require_once $full_path;
}
