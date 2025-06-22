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
          body{
            margin: 0;
            padding: 0;
          }
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
        .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

        </style>
        <title>Urban Nestle</title>
        <link rel="stylesheet" href="style/imgslider.css">
        <link rel="stylesheet" href="style/apartment.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/footer.css">
        <link rel="stylesheet" href="style/productslider.css">
        <link rel="stylesheet" href="style/about.css">
        <link rel="stylesheet" href="term.css">
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
                    <a href="userprofile.php"><button class="btn btn-secondary">Edit Profile</button></a>
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
  <header class="header">
    <h1 class="heading">Terms and Conditions</h1>
  </header>
  <main class="main-content">
  <section class="terms-container">
    <h2>Please read these terms and conditions carefully.</h2>
    <p>These terms and conditions ("Terms") govern your access to and use of the online apartment sales system ("System") operated by Urban Nestle . By accessing or using the System, you agree to be bound by these Terms. If you disagree with any part of the Terms, then you may not access or use the System.</p>
    <h3>1. Use of the System</h3>
    <p>The System is provided for your personal use only. You may not use the System for any commercial purposes without prior written consent. You agree to use the System in accordance with all applicable laws and regulations.</p>
    <h3>2. User Accounts</h3>
    <p>You may be required to create an account to access certain features of the System. You are responsible for maintaining the confidentiality of your account information, including your username and password, and for all activity that occurs under your account.</p>
    <h3>3. User Content</h3>
    <p>You may be able to submit content ("User Content") to the System. You retain all ownership rights to your User Content. However, by submitting User Content to the System, you grant us a non-exclusive, royalty-free, worldwide license to use, modify, publish, and translate your User Content in connection with the System.</p>
    <h3>4. Disclaimer</h3>
    <p>THE SYSTEM IS PROVIDED "AS IS" AND WITHOUT ANY WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED. WE DISCLAIM ALL WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. WE DO NOT WARRANT THAT THE SYSTEM WILL BE UNINTERRUPTED OR ERROR-FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE SYSTEM IS FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</p>
    <h3>5. Limitation of Liability</h3>
    <p>IN NO EVENT SHALL URBAN NESTLE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES ARISING OUT OF OR IN CONNECTION WITH YOUR USE OF THE SYSTEM, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>
    <h3>6. Changes to the Terms</h3>
    <p>We may revise these Terms at any time by updating this section. You are bound by any such revisions and should therefore periodically visit this page to review the current Terms that apply to your use of the System.</p>
    <h3>7. Termination</h3>
    <p>We may terminate or suspend your access to the System at any time, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
    <h3>8. Governing Law</h3>
    <p>These Terms shall be governed by and construed in accordance with the laws of Sri Lanka.</p>
    <h3>9. Contact Us</h3>
    <p>If you have any questions about these Terms, please contact us at support@urbannestle.com.</p>
    <div class="diagonal-separator"></div>
</section>

  </main>
<?php include "footer.php" ?>
