<?php
include ("database.php");

?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "delete from `loan` where `lid` = '$id'";

    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query failed".mysqli_error());
    }
    else{
        header('location:loanadmin.php');
        exit;
    }
?>