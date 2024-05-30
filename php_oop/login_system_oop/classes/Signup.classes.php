<?php

declare(strict_types=1);

class Signup extends Database
{
    protected function addNewUser(string $uid, string $pwd, string $email)
    {
        $insert_sql = "INSERT INTO
                    users (users_uid, users_pwd, users_email)
                VALUES
                    (:users_uid, :users_pwd, :users_email)";

        $statement = $this->connect()->prepare($insert_sql);

        // Hashing the password before inserting to our db
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        $statement->bindValue(":users_uid", $uid);
        $statement->bindValue(":users_pwd", $hashedPwd);
        $statement->bindValue(":users_email", $email);

        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../index.php?error=stmtfailed");
        }
    }

    protected function checkUserExists(string $uid, string $email)
    {
        // SQL query that checks if the uid or email is similar to any records
        $sql = "SELECT 
                    users_uid 
                FROM 
                    users 
                WHERE 
                    users_uid = :users_uid 
                OR
                    users_email = :users_email";
        $statement = $this->connect()->prepare($sql);

        $statement->bindValue(":users_uid", $uid);
        $statement->bindValue(":users_email", $email);

        // Checks if there are any errors in executing statement
        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../index.php?=error=stmtfailed");
            exit();
        }

        // Checks if a user with similar credentials already exists
        if ($statement->rowCount() > 0) {
            return true; // another user exists
        } else {
            return false; // another user does not exist
        }
    }
}
