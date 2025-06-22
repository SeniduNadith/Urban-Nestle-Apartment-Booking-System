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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $apartment_address = $row["address"];
    $employment_status = $_POST["employment_status"];
    $annual_income = $_POST["annual_income"];  // Format: YYYY-MM-DD
    $price = $row["price"];
}


$query = "INSERT INTO `loan`(`fname`,`email`,`phoneno`,`address`,`amount`,`e_status`,`income`) 
        VALUES ('$name','$email','$phone','$apartment_address','$price','$employment_status','$annual_income')";


// used when reading = $result = $connection->query($query);
$result = mysqli_query($connection,$query);
//insert data Done
if ($result) {
    $query = "UPDATE `apartment` SET `a_status`=0,`id`='$user_id' WHERE `aid` = '$id'";
    $result2 = mysqli_query($connection,$query);
    
    if($result){
    echo "<script>
        alert('Loan Applied Successfully');
        window.location.href = 'userprofile.php';
    </script>";
 }}
?>
