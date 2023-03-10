<?php

    include_once "assets/php/db-details.php";

    $query1 = "CREATE DATABASE IF NOT EXISTS $dbname";
    $query2 = "CREATE TABLE IF NOT EXISTS Users (
        ID INT AUTO_INCREMENT NOT NULL,
        NAME VARCHAR(30) NOT NULL,
        EMAIL VARCHAR(50) NOT NULL UNIQUE,
        PASSWORD VARCHAR(255) NOT NULL,
        PHONENUMBER CHAR(11) NOT NULL UNIQUE,
        PRIMARY KEY (ID)
    );";
    $query3 = "CREATE TABLE IF NOT EXISTS Notifications (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        TITLE VARCHAR(200) NOT NULL,
        MESSAGE VARCHAR(200) NOT NULL,
        COLOR VARCHAR(40) NOT NULL,
        TIME TIMESTAMP,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";


    $servicesQueries = [];
    $servicesQueries[0] = "CREATE TABLE IF NOT EXISTS GraphicDesignProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        DESIGNTYPE VARCHAR(30) NOT NULL,
        DELIVERYTIME VARCHAR(30) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        DESCRIPTION VARCHAR(255) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";
    $servicesQueries[1] = "CREATE TABLE IF NOT EXISTS InstagramContentProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        PAGETYPE VARCHAR(30) NOT NULL,
        SERVICETYPE VARCHAR(30) NOT NULL,
        DESCRIPTION VARCHAR(30) NOT NULL,
        PAGEID VARCHAR(30) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";
    $servicesQueries[2] = "CREATE TABLE IF NOT EXISTS LogoDesignProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        LOGOTYPE VARCHAR(30) NOT NULL,
        DELIVERYTIME VARCHAR(30) NOT NULL,
        DESCRIPTION VARCHAR(255) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";
    $servicesQueries[3] = "CREATE TABLE IF NOT EXISTS PhotographyProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        NUMBEROFPHOTOS INT NOT NULL,
        CITY VARCHAR(30) NOT NULL,
        PHOTOTYPE VARCHAR(30) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        TIME VARCHAR(30) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";
    $servicesQueries[4] = "CREATE TABLE IF NOT EXISTS VideographyProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        VIDEOTYPE VARCHAR(30) NOT NULL,
        CITY VARCHAR(30) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        SHOOTINGDATE VARCHAR(30) NOT NULL,
        DELIVERYDATE VARCHAR(30) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";
    $servicesQueries[5] = "CREATE TABLE IF NOT EXISTS WebDesignProjects (
        ID INT AUTO_INCREMENT NOT NULL,
        USERID INT,
        WEBSITETYPE VARCHAR(30) NOT NULL,
        BUDGET VARCHAR(30) NOT NULL,
        DESCRIPTION VARCHAR(255) NOT NULL,
        WHATSAPPNUMBER CHAR(11) NOT NULL,
        SUBMITTIME VARCHAR(30) NOT NULL,
        PRIMARY KEY (ID),
        FOREIGN KEY (USERID)
            REFERENCES Users(ID)
    );";

    $conn = new PDO("mysql:host:$host", $username, $password);
    $conn->exec($query1);
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->exec($query2);
    $conn->exec($query3);

    foreach ($servicesQueries as $key => $query) {
        $conn->exec($query);
    }

    echo "Success!";

?>