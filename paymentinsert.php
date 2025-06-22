<?php
include "header.php";
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
//add default title value as apartment titla name

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $apartment_id = $id;
    
    $user_id = $_SESSION["user_id"];
    $apartment_id = $id;
    $cardholder = $_POST["cardholder"];
    $cardnumber = $_POST["cardnumber"];
    $expiration = $_POST["expiration"];
    $amount = $row["price"];
    $title = $row["title"];
    $dateofpayment = $_POST["dateofpayment"];  // Format: YYYY-MM-DD
    $cvv = $_POST["cvv"];
}


$query = "INSERT INTO `payment`(`card_name`,`card_no`,`amount`,`expdate`,`dop`,`cvv`,`title`,`user_id`,`apartment_id`) 
        VALUES ('$cardholder','$cardnumber','$amount','$expiration','$dateofpayment','$cvv','$title','$user_id','$apartment_id')";


// used when reading = $result = $connection->query($query);
$result = mysqli_query($connection,$query);
//insert data Done
if ($result) {
    $query = "UPDATE `apartment` SET `a_status`=0,`id`='$user_id' WHERE `aid` = '$id'";
    $result = mysqli_query($connection,$query);
     echo "payment successful!";
     echo "You have successfully bought ur apartment";

     //new user id is assigned to apartment then a_Status = 0, no need of extra payment column
     echo "<a href='index.php'>Go back to home page</a>";
    //header("location: signup-success.html"); //redirecting to a page
    //exit;
 }
?>
