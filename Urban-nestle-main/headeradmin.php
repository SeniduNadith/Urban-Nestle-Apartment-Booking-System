<?php  
include "database.php";
session_start(); 
        if(isset($_SESSION["user_id"])){
            $connection = require "database.php";
        
            $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        
            $result = $connection->query($query);
            $user = $result->fetch_assoc();
        }
        
        ?>

<?php
if(!(isset($_SESSION["user_id"]))){
    header("location:login.php");
    exit;
} ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Urban Nestle</title>
        <link rel="stylesheet" href="style/header.css">
        <link rel="stylesheet" href="style/adminform.css">
        <link rel="stylesheet" href="admin/tableadmin.css">
        
        <style>
            .admin-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 20px;
}

.admin-grid-item {
    background: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: calc(100% - 40px);
    max-width: 600px;
    border-radius: 8px;
}

.admin-text {
    color: #666;
}
.admin-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    border-radius: 5px;
    text-decoration: none;
}
        </style>
      <!--Icon link fontawesome-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!--google font poppins-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <style>
            .dash{
            color: #fff;
            background-image: linear-gradient(rgb(0, 0, 0), rgb(11, 85, 15));
            font-family:"poppins";
            padding:10px;
            border-radius:10px;
            margin-top:10px;
            margin-left:10px;
            text-align: center;
            }
        </style>
        <div class="nav">
                <a href="dashboard.php"><li class="b1">Dashboard</li></a>
                <a href="users.php"><li class="b1">User</li></a>
                <a href="apartmentadmin.php"><li class="b1">Apartment</li></a>
                <a href="loanadmin.php"><li class="b1">Loan</li></a>
                <a href="transactionadmin.php"><li>Transaction</li></a>
                <a href="adminanswer.php"><li>Reviews</li></a>
                    <a href="logout.php"><button class="btn btn-secondary">Log Out</button></a>
        </div>