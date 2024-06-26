<?php

declare(strict_types=1);

/*
    SignupController
        This class is responsible to handling the form data from our index
*/

class SignupController extends SignupModel
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

    public function signup_user()
    {
        session_start();

        if (!empty($this->check_empty_inputs())) {
            $_SESSION["empty_input_errors"] = $this->check_empty_inputs();
        } else {
            unset($_SESSION["empty_input_errors"]);
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

        if ($this->are_passwords_mismatched()) {
            $_SESSION["password_mismatch_error"] = "Passwords are not the same!";
            unset($_SESSION["empty_input_errors"]["password_empty_error"]);
            unset($_SESSION["empty_input_errors"]["password_repeat_empty_error"]);
        } else {
            unset($_SESSION["password_mismatch_error"]);
        }

        if ($this->user_already_exists()) {
            $_SESSION["user_exists_error"] = "User already exists!";
        } else {
            unset($_SESSION["user_exists_error"]);
        }

        // If there are no errors, add the user to the database
        if (
            !isset($_SESSION["empty_input_errors"])
            && !isset($_SESSION["uid_invalid_error"])
            && !isset($_SESSION["email_invalid_error"])
            && !isset($_SESSION["password_mismatch_error"])
            && !isset($_SESSION["user_exists_error"])
        ) {
            $_SESSION["signup_success"] = "Signup successful!";
            $this->add_user($this->uid, $this->email, $this->password);
        }

        // Return to the index with errors
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
        return !empty($this->uid) && !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    // Checks if the email is a valid email
    private function is_email_invalid(): bool
    {
        return !empty($this->email) && !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    // Checks if the passwords are the same
    private function are_passwords_mismatched()
    {
        return !empty($this->password) &&
            !empty($this->password_repeat) &&
            $this->password !== $this->password_repeat;
    }

    // Checks if the user already exists within our database
    private function user_already_exists()
    {
        return $this->get_user($this->uid, $this->email);
    }
}
