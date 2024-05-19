<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // ERROR HANDLERS
        $errors = [];
        // Checking if any of the inputs are empty, returns true if an input is
        // empty.
        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input_error"] = "Fill in all fields!";
        }

        // Checking if the entered email is valid.
        if (is_email_invalid($email)) {
            $errors["invalid_email_error"] = "Invalid email used!";
        }

        if (is_username_taken($pdo, $username)) {
            $errors["username_taken_error"] = "Username already taken!";
        }

        if (is_email_registered($pdo, $email)) {
            $errors["email_used_error"] = "Email already registered!";
        }

        require_once "config_session.inc.php"; // starts a session

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
} else {
    // Sends the user back to the index page
    header("Location: ../index.php");
    die();
}
