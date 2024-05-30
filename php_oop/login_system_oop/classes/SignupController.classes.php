<?php

declare(strict_types=1);

class SignupController extends Signup
{
    private string $uid;
    private string $pwd;
    private string $pwdRepeat;
    private string $email;

    public function __construct(
        string $uid,
        string $pwd,
        string $pwdRepeat,
        string $email
    ) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if ($this->checkEmptyInputs()) {
            // echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        if ($this->invalidUid()) {
            // echo "Invalid username!";
            header("Location: ../index.php?error=invalidusername");
            exit();
        }

        if ($this->invalidEmail()) {
            // echo "Invalid email!";
            header("Location: ../index.php?error=invalidemail");
            exit();
        }

        if ($this->pwdDoesNotMatch()) {
            // echo "Passwords don't match!";
            header("Location: ../index.php?error=passwordmismatch");
            exit();
        }

        if ($this->uidEmailTakenCheck()) {
            // echo "Username or email taken!";
            header("Location: ../index.php?error=useroremailtaken");
            exit();
        }

        // If there are no errors, create a new user in our database
        $this->addNewUser($this->uid, $this->pwd, $this->email);
    }

    private function checkEmptyInputs()
    {
        if (
            empty($this->uid) || empty($this->pwd)
            || empty($this->pwdRepeat) || empty($this->email)
        ) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidUid()
    {
        // Checks if a string is alphanumeric
        if (preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            return false;
        } else {
            return true;
        }
    }

    private function invalidEmail()
    {
        // Checks if the email is a valid email
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function pwdDoesNotMatch()
    {
        return $this->pwd !== $this->pwdRepeat;
    }

    private function uidEmailTakenCheck()
    {
        return $this->checkUserExists($this->uid, $this->email);
    }
}
