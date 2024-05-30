<?php

declare(strict_types=1);

require_once "../classes/Database.classes.php";
require_once "../classes/Signup.classes.php";
require_once "../classes/SignupController.classes.php";

if (isset($_POST["submit"])) {
    // Get the form data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiate SignupController class
    $signupController = new SignupController($uid, $pwd, $pwdRepeat, $email);

    // Running error handlers and user signup
    $signupController->signupUser();

    // Going back to front page
    header("Location: ../index.php?error=none");
}
