<?php

    include_once "assets/php/db-details.php";

    $conn = new PDO("mysql:host=$host;db=$dbname", $username, $password);
    $query = "DROP DATABASE IF EXISTS $dbname";
    $conn->exec($query);

    echo "Success!";

?>