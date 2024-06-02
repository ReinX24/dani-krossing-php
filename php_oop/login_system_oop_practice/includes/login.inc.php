<?php

declare(strict_types=1);

require_once "../classes/Database.classes.php";
require_once "../classes/LoginModel.classes.php";
require_once "../classes/LoginController.classes.php";

$uid_or_email = $_POST["uid_or_email"];
$password = $_POST["password"];

$login_controller = new LoginController($uid_or_email, $password);

$login_controller->login_user();
