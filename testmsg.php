<?php
    include "header.php";
    include "database.php";
    if(isset($_POST["pay"])){
        $pay = $_POST["pay"];

        $query2 = "SELECT price FROM apa WHERE aid='1'";
        $result = mysqli_query($connection,$query2);
        $row = mysqli_fetch_assoc($result);

        if($pay == $row["price"]){
            ?><p>Apartment bought successfully</p><?php
        }else{
            $total = ((float)$row["price"] - (float)$pay);
            ?><p>Due <?php echo $total ?></p> <?php
        }

    }

?>