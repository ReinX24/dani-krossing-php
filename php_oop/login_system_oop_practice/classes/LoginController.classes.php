<?php

declare(strict_types=1);

require_once "../includes/autoloader.inc.php";

use LoginModel;

class LoginController extends LoginModel
{
    private string $uid_or_email;
    private string $password;

    public function __construct(string $uid_or_email, string $password)
    {
        $this->uid_or_email = $uid_or_email;
        $this->password = $password;
    }

    public function login_user()
    {
        session_start();

        if (!empty($this->check_empty_inputs())) {
            $_SESSION["empty_input_errors"] = $this->check_empty_inputs();
        } else {
            unset($_SESSION["empty_input_errors"]);
        }

        if ($this->mismatched_passwords()) {
            $_SESSION["wrong_password_message"] = "Wrong password!";
        } else {
            unset($_SESSION["wrong_password_message"]);
        }

        if (
            !isset($_SESSION["empty_input_errors"])
            && !isset($_SESSION["wrong_password_message"])
        ) {
            $_SESSION["login_success"] = "Login successful!";

            $user_information = $this->get_user($this->uid_or_email);
            $_SESSION["current_user_information"] = $user_information;
            header("Location: ../logged_in.php");
        } else {
            header("Location: ../index.php");
            exit();
        }
    }

    private function check_empty_inputs(): array
    {
        $errors = [];

        if (empty($this->uid_or_email)) {
            $errors["empty_uid_or_email_error"] = "Username or email is empty!";
        }

        if (empty($this->password)) {
            $errors["empty_password_error"] = "Password is empty!";
        }

        return $errors;
    }

    private function mismatched_passwords()
    {
        $stored_password = $this->get_user_password($this->uid_or_email);
        return !empty($this->uid_or_email) && !empty($this->password) && !password_verify($this->password, $stored_password["users_pwd"]);
    }
}
