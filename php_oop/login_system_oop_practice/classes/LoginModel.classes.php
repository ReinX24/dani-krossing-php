<?php

declare(strict_types=1);

require_once "../includes/autoloader.inc.php";

use Database;

class LoginModel extends Database
{
    protected function get_user_password(string $uid_or_email)
    {
        $get_password_sql =
            "SELECT
                users_pwd
            FROM
                users
            WHERE
                users_uid = :users_uid
            OR
                users_email = :users_email";

        $pdo = $this->connect_database();

        $statement = $pdo->prepare($get_password_sql);
        $statement->bindValue(":users_uid", $uid_or_email);
        $statement->bindValue(":users_email", $uid_or_email);

        $statement->execute();

        return $statement->fetch();
    }

    protected function get_user(string $uid_or_email)
    {
        $get_user_sql =
            "SELECT 
                users_id, users_uid, users_email
            FROM 
                users
            WHERE
                users_uid = :users_uid
            OR
                users_email = :users_email";

        $pdo = $this->connect_database();
        $statement = $pdo->prepare($get_user_sql);

        $statement->bindValue(":users_uid", $uid_or_email);
        $statement->bindValue(":users_email", $uid_or_email);

        $statement->execute();

        return $statement->fetch();
    }
}
