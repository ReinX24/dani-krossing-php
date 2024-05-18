<?php

// Using cookies to store session data
ini_set("session.use_only_cookies", true);

// Making sure that a session exists by checking existing session ID
ini_set("session.use_strict_mode", true);

// 1800 seconds = 30 minutes
session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/",
    "secure" => true,
    "httponly" => true
]);

// All settings above should me made before starting a session
session_start();

// Checks if the current session has last_generation key
if (isset($_SESSION["last_regeneration"])) {
    session_regenerate_id(true); // regenerates the session id
    $_SESSION["last_regeneration"] = time(); // creates key value for last_regeneration
} else {
    // $interval is equal to 1800 seconds or 30 minutes
    $interval = 60 * 30;

    // Checks if the last_regeneration has passed 30 minutes, if so regenerate
    // the current session id.
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();
    }
}
