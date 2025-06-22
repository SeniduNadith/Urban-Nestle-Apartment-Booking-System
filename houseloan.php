<?php  
require_once "database.php";
session_start(); 
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
        <style>
            #img{
                right:20%
            }
            .content {
            display: block;
            border: 1px solid black;
            margin: 10px 0;
            padding: 10px;
        }
        .content a {
            text-decoration: none;
            color: black;
            display: block;
        }
        .content p {
            margin: 0;
            color: inherit;
        }
        </style>
          <style>
            body{
                
                object-fit:scale-down;
                background-repeat: no-repeat;
                background-size: cover;
                overflow-y: scroll;
                
            }
            .house-container{
                display: flex;
                flex-direction: column;
                background-image: url("bank/house.jpg");
                height: 600px;
                background-attachment: fixed;  /* This makes the background fixed */
                background-size: cover;  /* Cover ensures the background covers the div */
                background-position: center;  /* Centers the background image */
                overflow-y: scroll;  /* Allows scrolling within the div */
                /*mainly oveflow-y & background-attachment*/
            }

            .house-container::-webkit-scrollbar {
               display: none;
            }
            .house-item {
                display: flex;
                flex-direction: row;
                background-color: rgba(242, 255, 255, 0.8); /* Aqua color with 0.8 opacity */
                border-radius: 30px;
                width: 80%;
                height: 150px;
                margin: 10px 100px;
            }

            .house-item img {
                width: 200px;
                height: 130px;
                border-radius: 10px;
                opacity: 1; /* Full opacity */
            }

            .house-item a {
                opacity: 1; /* Ensuring links inside are also fully opaque */
                color: black;
                text-decoration: none;
                margin-left: 100px;
                position: relative;
                font-size: 27px;
                top: 42px;  
            }
            
        </style>

        <title>Urban Nestle</title>
        <link rel="stylesheet" href="style/imgslider.css">
        <link rel="stylesheet" href="style/apartment.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/footer.css">
        <link rel="stylesheet" href="style/productslider.css">
        <link rel="stylesheet" href="style/about.css">
        <link rel="stylesheet" href="style/contact.css">
        
      <!--Icon link fontawesome-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!--google font poppins-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <div class="nav">
                <div class="img-con"><a href="index.php"><img src="images/logo-removebg-preview.png" width="40%" alt="" id="img"></a></div>
                <a href="index.php"><li class="b1">Home</li></a>
                <a href="apartment.php"><li class="b1">Apartment</li></a>
                <a href="houseloan.php"><li class="b1">House Loan</li></a>
                <a href="about.php"><li>About Us</li></a>
                <a href="faq.php"><li>FAQ</li></a>
                <a href="contact.php"><li>Contact Us</li></a>
                <form id="searchForm" action="index.php" method="GET">
                    <input type="search" id="searchInput" name="query" placeholder="Search...">
                    <input type="submit" style="display: none;">
                </form>

                <?php  if(isset($_SESSION["user_id"])): ?>
                    <a href="#"><button class="btn btn-secondary">Edit Profile</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="btn btn-secondary">Log in</button></a>
                <?php endif ?>
                <?php  if(isset($_SESSION["user_id"])): ?>
                    <a href="logout.php"><button class="btn btn-secondary">Log Out</button></a>
                <?php else: ?>
                    <a href="signup.php"><button class="btn btn-secondary">Sign in</button></a>
                <?php endif ?>
                </div>
        
        <?php
       $searchQuery = "";
       if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
           $searchQuery = $_GET['query']; // Retrieve the value of 'query'
       
       $query = "SELECT * FROM apartment WHERE title LIKE '%$searchQuery%'";

       $result = mysqli_query($connection,$query);
       
       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               
                   echo '<div class="content"><a href="apartment-item.php?id=' . $row["aid"] . '"><p>' . $row['title'] . '      <b>'.$row["a_type"].'</b></p></a></div>';
           }} else {
               echo '<div>No results found.</div>';

           }
       }else{
        echo '';
       }
            
    ?>
              <!--house loans-->
        <div class="house-container">
            <div class="house-item">
                <img src="bank/Commercial-Bank-removebg-preview.png" alt="">
                <a href="https://www.combank.lk/personal-banking/loans/home-loans">Apply Now</a>
            </div>
            <div class="house-item">
                <img src="bank/sampath-removebg-preview.png" alt="">
                <a href="https://www.sampath.lk/personal-banking/loan/housing-loans/Sevana-Housing-Loan?category=personal_banking">Apply Now</a>
            </div>
            <div class="house-item">
                <img src="bank/nsb-removebg-preview.png" alt="">
                <a href="https://www.nsb.lk/loans_advances/housing/">Apply Now</a>
            </div>
            <div class="house-item">
                <img src="bank/boc-removebg-preview.png" alt="">
                <a href="http://www.boc.lk/personal-banking/loans/housing-loan/boc-housing-loan-scheme">Apply Now</a>
            </div>
            <div class="house-item">
                <img src="bank/seylan_logo-removebg-preview.png" alt="">
                <a href="https://www.seylan.lk/housing-loan/home-loan">Apply Now</a>
            </div>
            <div class="house-item">
                <img src="bank/dfcc-removebg-preview.png" alt="">
                <a href="https://www.dfcc.lk/products/home-loans/">Apply Now</a>
            </div>
        </div>
<?php  include "footer.php" ?>