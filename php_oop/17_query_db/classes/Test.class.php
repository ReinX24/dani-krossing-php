<?php

class Test extends Database
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";

        $statement = $this->connect()->query($sql);

        while ($row = $statement->fetch()) {
            echo $row["users_firstname"] . "<br>";
        }
    }

    public function getUsersStmt(string $firstname, string $lastname)
    {
        $sql = "SELECT * FROM users 
            WHERE users_firstname = ? 
            AND users_lastname = ?";

        $statement = $this->connect()->prepare($sql);

        $statement->execute([$firstname, $lastname]);

        $names = $statement->fetchAll();

        foreach ($names as $name) {
            // echo $name["users_firstname"] . " " . $name["users_lastname"] . "<br>";
            echo $name["users_dateofbirth"] . "<br>";
        }
    }

    public function setUsersStmt(string $firstname, string $lastname)
    {
        $sql = "SELECT * FROM users 
            WHERE users_firstname = ? 
            AND users_lastname = ?";

        $statement = $this->connect()->prepare($sql);

        $statement->execute([$firstname, $lastname]);

        $names = $statement->fetchAll();

        foreach ($names as $name) {
            echo $name["users_dateofbirth"] . "<br>";
        }
    }
}
