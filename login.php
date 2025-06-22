<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $connection = require_once "database.php";

    $email = $_POST['email']; 
    $password = $_POST['password']; // the password from the form input
    

    // Directly taking the email from POST data.
    $query = "SELECT * from user WHERE `email` = '$email'"; 
    
    $result = $connection->query($query);

    $user = $result->fetch_assoc();
    //var_dump($user);
    //exit;

    //verify password
    if ($user){
        if($password === $user["password"]) {

            session_start();

            $_SESSION["user_id"] = $user["id"]; //same way must link apartment id
            if(isset($user["user_type"])){
                header("location:dashboard.php");
                exit;
            }else{
                header("location:index.php");
                exit;
            }
        //die("Login successful");
        }else {
            echo "Login failed: Invalid email or password.";
        }
 }
}

?>

<?php  session_start(); 
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
        <link rel="stylesheet" href="style/form.css">
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/footer.css">
        <link rel="stylesheet" href="style/imgslider.css">
        <link rel="stylesheet" href="style/productslider.css">
        <link rel="stylesheet" href="style/about.css">
        <link rel="stylesheet" href="style/contact.css">
        
        <style>
            body{
                background-image:url(images/b2.jpg);
                background-repeat: no-repeat;
                background-position: center center;  /* Center the image vertically and horizontally */
                background-size: cover;             /* Scale the background image to cover the entire container */
                background-attachment: fixed; 
            }
        </style>

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
                <input type="search" placeholder="search">
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
<form method="post" class="form"> <!--since in the same page-->
          <div class="form-container">
            <div class="form-content"><h1>Sign In</h1></div>
            <div class="form-content"><p>Login to continue</p></div>
            <div class="form-content"><label for="email">Email</label><input type="email" id="email" name="email" placeholder="Enter your Email here" required><br></div>
            <div class="form-content"><label for="password">Password</label><input type="password" id="password" name="password" placeholder="Enter your password" required><br></div>
            <div class="form-content"><button class="btn btn-primary">Log in</button></div>
            <div class="form-content"><p>Don't have an Account?. <a href="signup.php">Create One</a></p></div>
          </div>
        </form>
        <?php include "footer.php" ?>