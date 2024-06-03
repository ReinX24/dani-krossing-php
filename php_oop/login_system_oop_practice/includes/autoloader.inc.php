<?php

function load_class($class_name)
{
    $path_to_file = "../classes/" . $class_name . ".classes.php";

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}


spl_autoload_register("load_class");
