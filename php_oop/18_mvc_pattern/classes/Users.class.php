<?php

// This will be the Users model, used to handle db interactions
class Users extends Database
{
    protected function getUser(string $users_firstname)
    {
        $sql = "SELECT * FROM users WHERE users_firstname = :users_firstname";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":users_firstname", $users_firstname);
        $statement->execute();

        $results = $statement->fetch();

        return $results;
    }

    protected function insertUser(string $users_firstname, string $users_lastname, string $dob)
    {
        $sql = "INSERT INTO
                    users (users_firstname, users_lastname, users_dateofbirth)
                VALUES
                    (:users_firstname, :users_lastname, :users_dateofbirth)";

        $statement = $this->connect()->prepare($sql);
        $statement->bindValue("users_firstname", $users_firstname);
        $statement->bindValue("users_lastname", $users_lastname);
        $statement->bindValue("users_dateofbirth", $dob);
        $statement->execute();
    }
}
