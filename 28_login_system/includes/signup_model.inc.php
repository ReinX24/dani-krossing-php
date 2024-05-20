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

function set_user(PDO $pdo, string $username, string $pwd, string $email)
{
    $insert_user_query =
        "INSERT INTO
            users (username, pwd, email)
        VALUES
            (:username, :pwd, :email);";

    $statement = $pdo->prepare($insert_user_query);

    // Hashing our password
    $options = [
        "cost" => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $statement->bindValue(":username", $username);
    $statement->bindValue(":pwd", $hashedPwd);
    $statement->bindValue(":email", $email);

    $statement->execute();
}
