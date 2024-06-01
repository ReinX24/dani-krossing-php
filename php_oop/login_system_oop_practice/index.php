<?php

session_start();

$empty_uid_error = $_SESSION["empty_input_errors"]["uid_empty_error"] ?? "";
$empty_email_error = $_SESSION["empty_input_errors"]["email_empty_error"] ?? "";
$empty_password_error = $_SESSION["empty_input_errors"]["password_empty_error"] ?? "";
$empty_password_repeat_error = $_SESSION["empty_input_errors"]["password_repeat_empty_error"] ?? "";

// var_dump($_SESSION["empty_input_errors"]);

$invalid_uid_error = $_SESSION["uid_invalid_error"] ?? "";

$invalid_email_error = $_SESSION["email_invalid_error"] ?? "";

$passwords_mismatch_error = $_SESSION["password_mismatch_error"] ?? "";

// var_dump($_SESSION["user_exists_error"]);

$user_exists_error = $_SESSION["user_exists_error"] ?? "";

$success_message = $_SESSION["signup_success"] ?? "";

// Destroy all session variables and the current session
session_destroy();
unset($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Rein Solis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                    <div>
                        <a href="">Login</a>
                        <a href="">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

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
                <h1 class="mb-3 text-success"><?= $success_message; ?></h1>

                <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>

        <div class="container mt-3">
            <hr>
            <form action="" method="POST">
                <h1>Login</h1>
                <div class="mb-3">
                    <label for="uid" class="form-label">Name</label>
                    <input type="text" class="form-control" name="uid" placeholder="Enter username">
                </div>

                <button type="submit" value="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>