<?php

session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (isset($_SESSION["login_success"])) {
    $user_id = $_SESSION["current_user_information"]["users_id"];
    $user_name = $_SESSION["current_user_information"]["users_uid"];
    $user_email = $_SESSION["current_user_information"]["users_email"];
} else {
    // Return the user to the index page
    header("Location: index.php");
}

?>

<?php require_once "includes/header.inc.php"; ?>

<div class="container mt-3">
    <h1>Welcome, <?= $user_name; ?>!</h1>
    <p>Email: <?= $user_email ?></p>
</div>

<?php require_once "includes/footer.inc.php"; ?>