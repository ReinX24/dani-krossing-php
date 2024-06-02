<?php

// Destroy session variables and current session
session_start();
session_destroy();
unset($_SESSION);

header("Location: index.php");
