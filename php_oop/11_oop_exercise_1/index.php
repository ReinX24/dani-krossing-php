<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/pico.classless.min.css" />
</head>

<body>

    <main>
        <form action="includes/calc.inc.php" method="POST">
            <h1>My own calculator!</h1>
            <input type="number" name="num1" placeholder="First number">
            <select name="operator">
                <option value="add">Addition</option>
                <option value="sub">Subtraction</option>
                <option value="div">Division</option>
                <option value="mul">Multiplication</option>
            </select>
            <input type="number" name="num2" placeholder="Second number">
            <button type="submit" name="submit">Calculate</button>
        </form>

        <section>
            <h2><?= "Result: " . $_GET["result"] ?? ""; ?></h2>
        </section>
    </main>

</body>

</html>