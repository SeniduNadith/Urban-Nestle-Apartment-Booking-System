
<?php
    require "database.php";

    
    
    //inserting data into db table user
    if($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($_POST['email'], $_POST['name'], $_POST['phone_no'],$_POST['msg'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone_no = $_POST['phone_no'];
        $msg = $_POST['msg'];
    
    if(!(empty($email))){
        
        $query = "INSERT INTO `review` (`email`, `name`, `phone_no`,`msg`,`r_status`) VALUES ('$email','$name', '$phone_no','$msg','1')";

        //mysqli_query does the actual sql
        $result = mysqli_query($connection,$query);

        if ($result) {

                echo "<script>
                    alert('Review submitted Successfully');
                    window.location.href = 'contact.php';
                </script>";
             
        }
    }}}