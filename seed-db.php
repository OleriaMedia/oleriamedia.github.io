<?php

    require_once "assets/php/db-class.php";
    require_once "assets/php/db-details-class.php";

    $query = "INSERT INTO Users 
    (NAME, EMAIL, PASSWORD, PHONENUMBER) 
    VALUES (?, ?, ?, ?)";

    $db = new Database();

    $db->PreparedStatement($query, ["ممد رضایی", "mamadre@gmail.com", password_hash("mypassword", null, ["cost" => 10]), "09358899155"]);

?>