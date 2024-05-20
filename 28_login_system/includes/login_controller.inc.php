<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd)
{
    return empty($username) || empty($pwd);
}

function is_username_wrong(array|bool $result)
{
    return !$result;
}

function is_password_wrong(string $pwd, string $hashed_pwd)
{
    return !password_verify($pwd, $hashed_pwd); // true if passwords do not match
}
