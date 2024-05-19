<?php
// The model sends and retrieves data between our database and website.

declare(strict_types=1);

function get_username(PDO $pdo, string $username)
{
    $username_query = "SELECT username FROM users WHERE username = :username;";

    $statement = $pdo->prepare($username_query);
    $statement->bindValue(":username", $username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(PDO $pdo, string $email)
{
    $email_query = "SELECT email FROM users WHERE email = :email;";

    $statement = $pdo->prepare($email_query);
    $statement->bindValue(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
