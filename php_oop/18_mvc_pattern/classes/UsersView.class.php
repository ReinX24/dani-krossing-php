<?php

// This will be the users view, showing information in our website
class UsersView extends Users
{
    public function showUser(string $users_firstname)
    {
        $results = $this->showUser($users_firstname);
        echo "Full name: " . $results["users_firstname"];
    }
}
