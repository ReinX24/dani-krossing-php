<?php

session_start();

// Signup form errors
$empty_uid_error = $_SESSION["empty_input_errors"]["uid_empty_error"] ?? "";
$empty_email_error = $_SESSION["empty_input_errors"]["email_empty_error"] ?? "";
$empty_password_error = $_SESSION["empty_input_errors"]["password_empty_error"] ?? "";
$empty_password_repeat_error = $_SESSION["empty_input_errors"]["password_repeat_empty_error"] ?? "";

$invalid_uid_error = $_SESSION["uid_invalid_error"] ?? "";
$invalid_email_error = $_SESSION["email_invalid_error"] ?? "";
$passwords_mismatch_error = $_SESSION["password_mismatch_error"] ?? "";

$user_exists_error = $_SESSION["user_exists_error"] ?? "";
$signup_success_message = $_SESSION["signup_success"] ?? "";

// Login form errors
$empty_login_uid_or_email_error = $_SESSION["empty_input_errors"]["empty_uid_or_email_error"] ?? "";
$empty_login_password_error = $_SESSION["empty_input_errors"]["empty_password_error"] ?? "";
$wrong_login_password_message = $_SESSION["wrong_password_message"] ?? "";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// Destroy all session variables and the current session
session_destroy();
unset($_SESSION);

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

?>

<?php require_once "includes/header.inc.php"; ?>

<div class="container mt-3">
    <h1>Sign Up</h1>
    <form action="includes/signup.inc.php" method="POST">
        <div class="mb-3">
            <label for="uid" class="form-label">Name</label>
            <input type="text" class="form-control" name="uid" placeholder="Enter username">
            <?php if ($empty_uid_error) : ?>
                <p class="form-text text-danger"><?= $empty_uid_error; ?></p>
            <?php endif; ?>
            <?php if ($invalid_uid_error) : ?>
                <p class="form-text text-danger"><?= $invalid_uid_error; ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
            <?php if ($empty_email_error) : ?>
                <p class="form-text text-danger"><?= $empty_email_error; ?></p>
            <?php endif; ?>
            <?php if ($invalid_email_error) : ?>
                <p class="form-text text-danger"><?= $invalid_email_error; ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            <?php if ($empty_password_error) : ?>
                <p class="form-text text-danger"><?= $empty_password_error; ?></p>
            <?php endif; ?>
            <?php if ($passwords_mismatch_error) : ?>
                <p class="form-text text-danger"><?= $passwords_mismatch_error; ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password_repeat" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" name="password_repeat" placeholder="Enter password again">
            <?php if ($empty_password_repeat_error) : ?>
                <p class="form-text text-danger"><?= $empty_password_repeat_error; ?></p>
            <?php endif; ?>
        </div>

        <h1 class="mb-3 text-danger"><?= $user_exists_error; ?></h1>
        <h1 class="mb-3 text-success"><?= $signup_success_message; ?></h1>

        <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

<div class="container mt-3">
    <hr>
    <form action="includes/login.inc.php" method="POST">
        <h1>Login</h1>
        <div class="mb-3">
            <label for="uid_or_email" class="form-label">Username / Email</label>
            <input type="text" class="form-control" name="uid_or_email" placeholder="Enter username or email">
            <?php if ($empty_login_uid_or_email_error) : ?>
                <p class="form-text text-danger"><?= $empty_login_uid_or_email_error; ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            <?php if ($empty_login_password_error) : ?>
                <p class="form-text text-danger"><?= $empty_login_password_error; ?></p>
            <?php endif; ?>
            <?php if ($wrong_login_password_message) : ?>
                <p class="form-text text-danger"><?= $wrong_login_password_message; ?></p>
            <?php endif; ?>

        </div>

        <button type="submit" value="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php require_once "includes/footer.inc.php"; ?>