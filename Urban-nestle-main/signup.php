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
            header("location:index.php");
            exit;

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
                background-image:url(images/b5.jpg);
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
                
            
            <form action="process-signup.php" method="post" class="form" >
                <div class="form-container">
                    <h2 align="center">Sign up</h2>
                <div class="form-content"><label for="fname">First Name</label><input type="text" id="fname" name="fname" required><br></div>
                <div class="form-content"><label for="lname">Last Name</label><input type="text" id="lname" name="lname" required><br></div>
                <div class="form-content"><label for="email">Email</label><input type="email" id="email" name="email" required><br></div>
                <div class="form-content"><label for="password">Password</label><input type="password" id="password" name="password" required><br></div>
                <div class="form-content"><label for="repassword">confirm Password</label><input type="password" id="repassword" name="repassword" required><br></div>
                <div class="form-content"><p id="show"></p></div>
                <div class="form-content"><button type="submit" class="btn btn-primary">Create Account</button></div>
            </div>
            </form>
        
            <script>
                    var pass =document.getElementById("password");
                    var repass =document.getElementById("repassword");
                    var show = document.getElementById("show");

                    function check() {
                        if (pass.value.length < 8) {
                            show.style.color = "red";
                            show.innerHTML = "Password must contain at least 8 characters";
                            return; 
                        }
                        if (pass.value !== repass.value) {
                            show.style.color = "red";
                            show.innerHTML = "Passwords not matching";
                        } else {
                            show.style.color = "green";
                            show.innerHTML = "Passwords match";
                        }
                    }
                    pass.addEventListener('input', check);
                    repass.addEventListener('input', check);
            </script>
<?php  include "footer.php"; ?>