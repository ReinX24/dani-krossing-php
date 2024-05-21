<?php
require_once "includes/config_session.inc.php"; // start session
require_once "includes/signup_view.inc.php"; // get errors from signing up
require_once "includes/login_view.inc.php"; // get errors from logging in

// Getting existing users' data
require_once "includes/dbh.inc.php";
function get_users(PDO $pdo)
{
    $select_users_query =
        "SELECT * FROM users;";

    $statement = $pdo->prepare($select_users_query);

    $statement->execute();

    $existing_users = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $existing_users;
}
$users = get_users($pdo);
// ^For testing purposes only

$signup_data = signup_inputs();
$signup_errors = check_signup_errors();
$signup_success_message = check_signup_success();

$login_errors = check_login_errors();
$login_success_message = check_login_success();
$username = get_username();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login and Signup System</title>
    <!-- For custom theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="mt-4">
            <?php if (isset($username)) : ?>
                <h1>You are logged in as <?= $username; ?></h1>
            <?php else : ?>
                <h1>You are not logged in</h1>
            <?php endif; ?>
        </div>

        <hr>

        <?php if (isset($username)) : ?>
            <h2 class="my-4">Logout</h2>
            <form action="includes/logout.inc.php" method="POST">
                <button type="submit" class="btn btn-primary">Log out</button>
            </form>
        <?php endif; ?>

        <?php if ($login_success_message !== "success") : ?>
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
        <?php endif; ?>

        <?php if ($login_errors) : ?>
            <?php foreach ($login_errors as $error) : ?>
                <div class="alert alert-danger my-4">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($login_success_message === "success") : ?>
            <div class="alert alert-success my-4"><?= $login_success_message; ?></div>
        <?php endif; ?>

        <hr>

        <h2 class="my-4">Signup</h2>
        <form action="includes/signup.inc.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">
                    <h4>Username</h4>
                </label>
                <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $signup_data["username"] ?? ""; ?>">
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
                <input type="email" name="email" placeholder="E-Mail" class="form-control" value="<?= $signup_data["email"] ?? ""; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>

        <?php if ($signup_errors) : ?>
            <?php foreach ($signup_errors as $error) : ?>
                <div class="alert alert-danger my-4">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($signup_success_message === "success") : ?>
            <div class="alert alert-success my-4"><?= $signup_success_message; ?></div>
        <?php endif; ?>

        <hr>

        <?php if ($signup_errors) : ?>
            <?php foreach ($signup_errors as $error) : ?>
                <div class="alert alert-danger my-4">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($signup_success_message === "success") : ?>
            <div class="alert alert-success my-4"><?= $signup_success_message; ?></div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user["id"]; ?></th>
                        <td><?= $user["username"]; ?></td>
                        <td><?= $user["pwd"]; ?></td>
                        <td><?= $user["email"]; ?></td>
                        <td><?= $user["created_at"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>