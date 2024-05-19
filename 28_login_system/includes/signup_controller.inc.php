<?php
// The controller is responsible for handling data in our website.

declare(strict_types=1);

// Function to check if inputs are empty
function is_input_empty(string $username, string $pwd, string $email): bool
{
    return empty($username) || empty($pwd) || empty($email);
}

function is_email_invalid(string $email): bool
{
    // Checking if the email is valid or not
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_username_taken(PDO $pdo, string $username): bool
{
    return !empty(get_username($pdo, $username));
}

function is_email_registered(PDO $pdo, string $email): bool
{
    return !empty(get_email($pdo, $email));
}
