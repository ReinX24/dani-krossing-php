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
}
