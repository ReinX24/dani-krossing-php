<?php
require_once "includes/config_session.inc.php"; // start session
require_once "includes/signup_view.inc.php"; // get errors from session

$errors = check_signup_errors();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login System</title>
    <!-- For custom theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <h2 class="my-4">Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">
                    <h4>Username</h4>
                </label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">
                    <h4>Password</h4>
                </label>
                <input type="password" name="pwd" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <hr>


        <h2 class="my-4">Signup</h2>
        <form action="includes/signup.inc.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">
                    <h4>Username</h4>
                </label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    <h4>Password</h4>
                </label>
                <input type="password" name="pwd" placeholder="Password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">
                    <h4>Email</h4>
                </label>
                <input type="email" name="email" placeholder="E-Mail" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>

        <!-- TODO: finish styling this part -->
        <?php if ($errors) : ?>
            <?php foreach ($errors as $error) : ?>
                <p><?= $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>