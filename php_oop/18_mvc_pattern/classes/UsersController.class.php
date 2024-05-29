<?php

// Controller for our Users class, for inserting, updating, and deleting from db
class UsersController extends Users
{
    public function createUser(string $users_firstname, string $users_lastname, string $dob)
    {
        $this->insertUser($users_firstname, $users_lastname, $dob);
    }
}
