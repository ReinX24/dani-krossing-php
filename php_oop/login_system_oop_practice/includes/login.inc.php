<?php

declare(strict_types=1);

require_once "../includes/autoloader.inc.php";

use LoginController;

$uid_or_email = $_POST["uid_or_email"];
$password = $_POST["password"];

$login_controller = new LoginController($uid_or_email, $password);

$login_controller->login_user();
