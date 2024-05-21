<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        unset($_SESSION["errors_login"]);
        return $errors;
    }
}

function check_login_success()
{
    if (isset($_GET["login"]) && $_GET["login"] === "success") {
        return $_GET["login"];
    }
}

function get_username()
{
    if (isset($_SESSION["user_id"])) {
        return $_SESSION["username"];
    }
}
