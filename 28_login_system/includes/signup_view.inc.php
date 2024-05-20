<?php
// The view is for handling any data that is shown in our webpage.

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        unset($_SESSION["errors_signup"]);
        return $errors;
    }
}

function check_signup_success()
{
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        return $_GET["signup"];
    }
}

function signup_inputs()
{
    // Checking if the username is set and if the username is not taken
    $signup_data = [];
    if (
        isset($_SESSION["signup_data"]["username"])
        && !isset($_SESSION["errors_signup"]["username_taken_error"])
    ) {
        $signup_data["username"] = $_SESSION["signup_data"]["username"];
    }

    if (
        isset($_SESSION["signup_data"]["email"])
        && !isset($_SESSION["errors_signup"]["email_used_error"])
        && !isset($_SESSION["errors_signup"]["invalid_email_error"])
    ) {
        $signup_data["email"] = $_SESSION["signup_data"]["email"];
    }

    return $signup_data;
}
