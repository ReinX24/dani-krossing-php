<?php

require_once "dbh.php";

$sql_query = "SELECT * FROM data";

$result = mysqli_query($conn, $sql_query);

$data = [];

// Iterating through our database table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// echo "<pre>";
// print_r($data);
// echo "</pre>";

foreach ($data as $row) {
    echo $row["text"] . "<br>";
}
