
<?php 
include "database.php";
include "header.php";

if(!(isset($_SESSION["user_id"]))){
    header("location:login.php");
    exit;
}

$query="SELECT * FROM `apartment` WHERE `a_type`='Sale'";
$result = mysqli_query($connection,$query);
echo "<h1>For Sale</h1>";
while($row=mysqli_fetch_assoc($result)){
    if($row["a_status"] == 1){
    ?>
    <div class="grid">
    <div class="grid-item">
        <h2><?php echo $row["aid"]?></h2>
        <h2><?php echo $row["title"]?></h2>
        <p><?php echo $row["price"] ?></p>
        <p><?php echo $row["a_type"] ?></p>
        <a href="apartment-item.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Buy Now</button></a>
    </div>
    </div>
    <?php
    }
}

$query="SELECT * FROM `apartment` WHERE `a_type`='Rent'";
$result = mysqli_query($connection,$query);
echo "<h1>For Rent</h1>";
while($row=mysqli_fetch_assoc($result)){
    if($row["a_status"] == 1){
    
    ?>
    <div class="grid">
    <div class="grid-item">
        <h2><?php echo $row["aid"]?></h2>
        <h2><?php echo $row["title"]?></h2>
        <p><?php echo $row["price"] ?></p>
        <p><?php echo $row["a_type"] ?></p>
        <a href="apartment-item.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Rent Now</button></a>
    </div>
    </div>
    <?php
    }
}
?>