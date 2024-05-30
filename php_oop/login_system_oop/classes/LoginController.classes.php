<?php

declare(strict_types=1);

class LoginController extends Login
{
    private string $uid;
    private string $pwd;

    public function __construct(
        string $uid,
        string $pwd,
    ) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->checkEmptyInputs()) {
            // echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        // If there are no errors, get the user in our class
        $this->getExistingUser($this->uid, $this->pwd);
    }

    private function checkEmptyInputs()
    {
        if (empty($this->uid) || empty($this->pwd)) {
            return true;
        } else {
            return false;
        }
    }
}
