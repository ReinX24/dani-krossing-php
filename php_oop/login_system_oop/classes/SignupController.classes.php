<?php

declare(strict_types=1);

class SignupController
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
}
