<?php

session_start();

//print_r($_SESSION);

//displayer username after logged in
if(isset($_SESSION["user_id"])){
    $connection = require "database.php";

    $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $connection->query($query);
    $user = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Urban Nestle</title>
        <link rel="stylesheet" href="style/prdctSlider.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/footer.css">
        <link rel="stylesheet" href="style/imgslider.css">
        <link rel="stylesheet" href="style/productslider.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <div class="nav">
                <div class="img-con"><a href="index.php"><img src="images/logo-removebg-preview.png" width="40%" alt="" id="img"></a></div>
                <a href="index.php"><li class="b1">Home</li></a>
                <a href="apartment.html"><li class="b1">Apartment</li></a>
                <a href="houseloan.html"><li class="b1">House Loan</li></a>
                <a href="about.html"><li>About Us</li></a>
                <a href="contact.html"><li>Contact Us</li></a>
                <input type="search" placeholder="search">
                    <a href="login.php"><button class="btn btn-secondary">Edit Profile</button></a>
                    <a href="signup.html"><button class="btn btn-secondary">Log Out</button></a>
        </div>
        <?php
        include "index.php";
        include "footer.php"; ?>