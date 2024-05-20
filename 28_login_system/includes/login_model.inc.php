<?php

declare(strict_types=1);

function get_user(PDO $pdo, string $username): array|bool
{
    $get_user_query = "SELECT * FROM users WHERE username = :username;";

    $statement = $pdo->prepare($get_user_query);

    $statement->bindValue(":username", $username);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result; // returns an array if a user is found and false if not
}
