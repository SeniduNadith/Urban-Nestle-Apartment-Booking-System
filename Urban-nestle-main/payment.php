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
        <link rel="stylesheet" href="style/contact.css">
        <link rel="stylesheet" href="payment.css">
        
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
<?php
include("database.php");
if(!(isset($_SESSION["user_id"]))){
    header("location:login.php");
    exit;
}
if(isset($_GET["id"])){
    //assign passing id to variable
    $id=$_GET["id"];

    $query = "SELECT * FROM `apartment` WHERE `aid`='$id'";

    $result = mysqli_query($connection,$query);

    $row = mysqli_fetch_assoc($result);
}
?>


    <div class="container">
        <h2>PAYMENT DETAILS</h2>
        <form action="paymentinsert.php?id=<?php  echo $row["aid"] ?>" method="POST">  
        <div class="form-group">
                <label for="cardholder">CARDHOLDER'S NAME</label>
                <input type="text" id="cardholder" name="cardholder" required>
            </div>
            <div class="form-group">
                <label for="cardnumber">CARD NUMBER</label>
                <input type="text" id="cardnumber" name="cardnumber" required>
            </div>
            <div class="form-group">
                
                    <label for="expiration">EXPIRATION DATE</label>
                    <input type="date" id="expiration" name="expiration" required>
                
            </div>
            <div class="form-group">
                <div class="exp-cvv">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="dateofpayment">DATE OF PAYMENT</label>
                <input type="date" id="dateofpayment" name="dateofpayment" required>
            </div>
            <div class="form-group">
                <h2>Amount :     <?php echo $row["price"] ?></h2><br>
            </div>
            <div class="form-group">
                <input type="checkbox" id="c" onclick="checkbox()">
                <label for="c">I agree to the terms and conditions.</label>
            </div>
            <input type="submit" id="sub" value="Pay now">
            <script>
                document.getElementById("sub").disabled = true;
            function checkbox(){
                var chk = document.getElementById("c");
                if(chk.checked == true){
                    document.getElementById("sub").disabled = false;
                }else{
                    document.getElementById("sub").disabled = true;

                    }

            }
            </script>
        </form>
    </div>
</body>
</html>
