<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Login System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <header class="container">
        Rein Solis |
        <a href="index.php">HOME</a> |
        <a href="">PRODUCTS</a> |
        <a href="">CURRENT SALES</a> |
        <a href="">MEMBER+</a> |
    </header>

    <main class="container">
        <hr>
        <section>
            <h4>Sign Up</h4>
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">
                <input type="text" name="email" placeholder="E-mail">

                <button type="submit" name="submit">Sign Up</button>
            </form>
        </section>
        <hr>
        <section>
            <h4>Login</h4>
            <form action="inlcudes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">

                <button type="submit" name="submit">Login</button>
            </form>
        </section>
        <hr>
    </main>

</body>

</html>