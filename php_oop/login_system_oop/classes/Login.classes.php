<?php

declare(strict_types=1);

class Login extends Database
{
    protected function getExistingUser(string $uid, string $pwd)
    {
        $sql = "SELECT 
                    users_pwd
                FROM 
                    users
                WHERE
                    users_uid = :users_uid
                OR
                    users_email = :users_email";

        $statement = $this->connect()->prepare($sql);

        $statement->bindValue(":users_uid", $uid);
        $statement->bindValue(":users_email", $uid);

        if (!$statement->execute()) {
            $statement = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($statement->rowCount() == 0) {
            $statement = null;
            header("Location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $statement->fetch(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed["users_pwd"]);

        if ($checkPwd) {
            $sql = "SELECT 
                        * 
                    FROM 
                        users 
                    WHERE 
                        users_uid = :users_uid
                    OR
                        users_email = :users_email
                    AND
                        users_pwd = :users_pwd";

            $statement = $this->connect()->prepare($sql);

            $statement->bindValue(":users_uid", $uid);
            $statement->bindValue(":users_email", $uid);
            $statement->bindValue(":users_pwd", password_hash($pwd, PASSWORD_DEFAULT));

            if (!$statement->execute()) {
                $statement = null;
                header("Location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($statement->rowCount() == 0) {
                $statement = null;
                header("Location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $statement->fetch(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION["user_id"] = $user["users_id"];
            $_SESSION["user_uid"] = $user["users_uid"];
        } else {
            $statement = null;
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }

        $statement = null;
    }
}
