<?php

// Using PHP's built in password hashing method/s
$pwdSignup = "Rein";
$options = [
    "cost" => 12,
];

$hashedPassword = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "Rein1";
password_verify($pwdLogin, $hashedPassword);

if (password_verify($pwdLogin, $hashedPassword)) {
    echo "They are the same!";
} else {
    echo "They are not the same!";
}
