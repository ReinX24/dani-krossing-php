<?php

declare(strict_types=1);

require_once "../classes/SignupController.classes.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the variables from POST
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    $signup_controller = new SignupController($uid, $email, $password, $password_repeat);

    $signup_controller->singup_user();
}
