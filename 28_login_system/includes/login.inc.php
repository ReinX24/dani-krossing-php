<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";

        $signup_errors = [];

        if (is_input_empty($username, $pwd)) {
            $signup_errors["empty_input_error"] = "Fill in all fields!";
        }

        // Get the user in the database using their username
        $result = get_user($pdo, $username);

        // Checking if the user actually exists
        if (is_username_wrong($result)) {
            $signup_errors["login_error"] = "Incorrect login info!";
        }

        // Checks if the user exists and if the password is wrong
        if (
            !is_username_wrong($result) &&
            is_password_wrong($pwd, $result["pwd"])
        ) {
            $signup_errors["login_error"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php"; // starts a session

        if ($signup_errors) {
            $_SESSION["errors_login"] = $signup_errors;

            header("Location: ../index.php");
            die();
        } else {
            // Successful login
            // Creating a new session id
            $new_session_id = session_create_id(); // created a session id
            $session_id = $new_session_id . "_" . $result["id"];
            session_id($session_id); // setting a newly created session id

            $_SESSION["user_id"] = $result["id"];
            $_SESSION["username"] = htmlspecialchars($result["username"]);
            $_SESSION["last_regeneration"] = time();

            header("Location: ../index.php?login=success");

            $statement = null;
            $pdo = null;

            die();
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
