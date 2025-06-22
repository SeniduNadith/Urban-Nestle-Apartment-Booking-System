<?php
    require "database.php";

    
    
    //inserting data into db table user
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'],$_POST['password'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $query = "SELECT 1 FROM `user` WHERE email = '$email'";
        
        //stop duplicating email without fatal error
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            echo "This email address is already registered. Please use a different email address.";
        }

    if(!(empty($fname))){
        
        $query = "INSERT INTO `user` (`fname`, `lname`, `email`,`password`) VALUES ('$fname','$lname', '$email','$password')";

        //mysqli_query does the actual sql
        $result = mysqli_query($connection,$query);

        if ($result) {
           header("location: signup-success.php"); //redirecting to a page
           exit;
        }
    }}
?>