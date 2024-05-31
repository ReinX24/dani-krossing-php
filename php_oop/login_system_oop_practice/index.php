<?php

session_start();

$empty_uid_error = $_SESSION["empty_input_errors"]["uid_empty_error"] ?? "";
$empty_email_error = $_SESSION["empty_input_errors"]["email_empty_error"] ?? "";
$empty_password_error = $_SESSION["empty_input_errors"]["password_empty_error"] ?? "";
$empty_password_repeat_error = $_SESSION["empty_input_errors"]["password_repeat_empty_error"] ?? "";

$invalid_uid_error = $_SESSION["uid_invalid_error"] ?? "";
$invalid_email_error = $_SESSION["email_invalid_error"] ?? "";

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

        <h1>Sign Up</h1>
        <form action="includes/signup.inc.php" method="POST">
            <label for="uid">Name</label>
            <input type="text" name="uid" placeholder="Username">
            <p><?= $empty_uid_error; ?></p>
            <p><?= $invalid_uid_error; ?></p>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email">
            <p><?= $empty_email_error; ?></p>
            <p><?= $invalid_email_error; ?></p>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
            <p><?= $empty_password_error; ?></p>

            <label for="password_repeat">Repeat Password</label>
            <input type="password" name="password_repeat" placeholder="Password Repeat">
            <p><?= $empty_password_repeat_error; ?></p>

            <button type="submit" value="submit">Sign Up</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>