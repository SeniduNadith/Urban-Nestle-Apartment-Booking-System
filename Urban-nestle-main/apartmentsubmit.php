
<?php
    require "database.php";

    
    
    //inserting data into db table user
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $a_type = $_POST['a_type'];
        $price = $_POST['price'];

        
        $query = "INSERT INTO `apartment` (`title`, `description`, `city`,`address`,`a_type`,`price`,`a_status`) 
                    VALUES ('$title','$description', '$city','$address','$a_type','$price','1')";

        //mysqli_query does the actual sql
        $result = mysqli_query($connection,$query);

        if ($result) {
           echo "Your Review have been submitted successfully";
           header("location:index.php");
           exit;
        }
    }