<?php
// The view is for showing webpages of our website.

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        unset($_SESSION["errors_signup"]);
        return $errors;
    }
}
