<?php

session_start();
session_unset(); // unsets all session variables
session_destroy(); // destroys the current session

header("Location: ../index.php");
die();
