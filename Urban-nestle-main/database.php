<?php

    $host = "localhost";
    $dbname = "urbannestle";
    $username="root";
    $password = "";

    $connection = new mysqli($host, $username, $password, $dbname);

    if(!$connection){
        die("Connection error");
    }

    return $connection;

?>