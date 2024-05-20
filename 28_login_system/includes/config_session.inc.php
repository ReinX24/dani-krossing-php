<?php

// Settings for adding security to sessions
// Using cookies to store the session ID
ini_set("session.use_only_cookies", true);
// Checks if the session ID is initialized by the server and is not passed in
ini_set("session.use_strict_mode", true);

// Setting the attributes of our cookies
session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/",
    "secure" => true,
    "httponly" => true
]);

// Starting a session
session_start();

if (isset($_SESSION["user_id"])) {
    // Code that runs if the user is logged in
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }
} else {
    // Code that runs if the user is NOT logged in
    // Regenerating session id in our cookie every 30 minutes
    // Initializing the last_regeneration attribute
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}

function regenerate_session_id()
{
    // Regenerate session ID and regenerate lifetime
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id_loggedin()
{
    session_regenerate_id(true);
    // After regenerating id, append the user id to the session id
    // Creating a new session id
    $user_id = $_SESSION["user_id"];
    $new_session_id = session_create_id(); // created a session id
    $session_id = $new_session_id . "_" . $user_id;
    session_id($session_id); // setting a newly created session id

    $_SESSION["last_regeneration"] = time();
}
