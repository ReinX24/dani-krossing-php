<?php

declare(strict_types=1);

session_start();

session_unset(); // unsets all session variables
session_destroy(); // destroys the current session

header("Location: ../index.php?error=none");
