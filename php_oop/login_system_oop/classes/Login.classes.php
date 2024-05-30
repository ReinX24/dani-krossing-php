<?php

declare(strict_types=1);

class Login extends Database
{
    protected function getExistingUser(string $uid, string $pwd)
    {
        $sql = "SELECT 
                    * 
                FROM 
                    users
                WHERE
                    users_uid = :users_uid
                OR
                    users_email = :users_email";
    }
}
