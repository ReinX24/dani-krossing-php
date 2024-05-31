<?php

declare(strict_types=1);

class SignupController
{
    private string $uid;
    private string $email;
    private string $password;
    private string $password_repeat;

    public function __construct(string $uid, string $email, string $password, string $password_repeat)
    {
        $this->uid = $uid;
        $this->email = $email;
        $this->password = $password;
        $this->password_repeat = $password_repeat;
    }

    public function singup_user()
    {
        session_start();

        if (!empty($this->check_empty_inputs())) {
            $_SESSION["empty_input_errors"] = $this->check_empty_inputs();
        } else {
            unset($_SERVER["empty_input_error"]);
        }

        if ($this->is_uid_invalid()) {
            $_SESSION["uid_invalid_error"] = "Username must only contain numbers and letters!";
            unset($_SESSION["empty_input_errors"]["uid_empty_error"]);
        } else {
            unset($_SESSION["uid_invalid_error"]);
        }

        if ($this->is_email_invalid()) {
            $_SESSION["email_invalid_error"] = "Invalid Email!";
            unset($_SESSION["empty_input_errors"]["email_empty_error"]);
        } else {
            unset($_SESSION["email_invalid_error"]);
        }

        header("Location: ../index.php");
        exit();
    }

    // Function that checks if any of the inputs are empty
    private function check_empty_inputs(): array
    {
        $errors = [];
        if (empty($this->uid)) {
            $errors["uid_empty_error"] = "Username is empty!";
        }

        if (empty($this->email)) {
            $errors["email_empty_error"] = "Email is empty!";
        }

        if (empty($this->password)) {
            $errors["password_empty_error"] = "Password is empty!";
        }

        if (empty($this->password_repeat)) {
            $errors["password_repeat_empty_error"] = "Password repeat is empty!";
        }

        return $errors;
    }

    // Function that checks if the username or uid is valid (alphanumeric)
    private function is_uid_invalid(): bool
    {
        return !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    // Checks if the email is a valid email
    private function is_email_invalid(): bool
    {
        return !empty($this->email) && !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}
