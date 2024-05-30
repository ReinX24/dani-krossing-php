<?php

/*
Database Name: ooplogin
Database users table SQL:
CREATE TABLE users (
	users_id INT(11) AUTO_INCREMENT PRIMARY KEY NOT null,
    users_uid TINYTEXT NOT null,
    users_pwd LONGTEXT NOT null,
    users_email TINYTEXT NOT null
);
*/

class Database
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $databaseHandler = new PDO(
                "mysql:host=localhost;dbname=ooplogin;",
                $username,
                $password
            );
            return $databaseHandler;
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }
}
