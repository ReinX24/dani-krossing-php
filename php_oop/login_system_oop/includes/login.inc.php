<?php

declare(strict_types=1);

require_once "../classes/Database.classes.php";
require_once "../classes/Login.classes.php";
require_once "../classes/LoginController.classes.php";

if (isset($_POST["submit"])) {
    // Get the form data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    $loginController = new LoginController($uid, $pwd);

    $loginController->loginUser();

    // Going back to front page
    header("Location: ../index.php?error=none");
}
