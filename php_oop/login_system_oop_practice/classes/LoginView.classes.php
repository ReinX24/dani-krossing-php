<?php

declare(strict_types=1);

class LoginView extends LoginModel
{
    public function get_user_information()
    {
        $login_credentials = $this->get_user($_SESSION["login_uid_or_email"]);
        unset($_SESSION["login_uid_or_email"]);
        return $login_credentials;
    }
}
