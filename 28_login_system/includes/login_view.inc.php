<?php

declare(strict_types=1);

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        var_dump($_SESSION["errors_login"]);
        return $_SESSION["errors_login"];
    }
}
