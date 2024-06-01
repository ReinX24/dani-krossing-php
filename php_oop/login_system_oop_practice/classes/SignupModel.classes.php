<?php

declare(strict_types=1);

/*
    SignupModel
        This class is responsible for interacting with our database
*/

class SignupModel extends Database
{
    protected function get_user(string $uid, string $email)
    {
        $get_user_sql =
            "SELECT 
                *
            FROM 
                users
            WHERE
                users_uid = :users_uid
            OR
                users_email = :users_email";

        $pdo = $this->connect_database();
        $statement = $pdo->prepare($get_user_sql);

        $statement->bindValue(":users_uid", $uid);
        $statement->bindValue(":users_email", $email);

        $statement->execute();

        return $statement->fetch();
    }

    protected function add_user(string $uid, string $email, string $password)
    {
        $insert_user_sql =
            "INSERT INTO
                users (users_uid, users_email, users_pwd)
            VALUES
                (:users_id, :users_email, :users_password)";

        $pdo = $this->connect_database();
        $statement = $pdo->prepare($insert_user_sql);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $statement->bindValue(":users_id", $uid);
        $statement->bindValue(":users_email", $email);
        $statement->bindValue(":users_password", $hashed_password);

        return $statement->execute();
    }
}
