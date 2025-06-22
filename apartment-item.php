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
?>
<div class="cont" style="display:flex;flex-direction:row;">
<div class="apa-container" >
<img src="apart/1.jpg" alt="Product 1" style="width: 600px; height: 300px;" class="apa-image">
</div>
<div class="apa-container" style="display:block;width:700px">
<h1><?php echo $row["aid"] ?></h1>
<p><?php echo $row["title"]?></p><br>
<p><?php echo $row["description"]?></p><br>
<p><?php echo $row["city"]?></p><br>
<p><?php echo $row["address"]?></p><br>
<p><?php echo $row["a_type"]?></p><br>
<p><b><?php echo $row["price"]?></b></p><br>
<?php
if($row["a_status"]==1){
    ?>
    <p>Available</p><br>
    <a href="loan.php?id=<?php  echo $row["aid"]?>"><button class="btan">Apply our loan</button></a>
    <a href="payment.php?id=<?php  echo $row["aid"]?>"><button class="btan">Pay now</button></a>
<?php
}elseif($row["a_status"]==0){
    echo "<p>Sold</p><br>";
}?>
</div>
</div>
<?php  include "footer.php"; ?>
<!--show suggested apartments as well, just assign the ones in the same city-->