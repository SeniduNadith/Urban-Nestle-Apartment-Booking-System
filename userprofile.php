<?php
    include "database.php";

include "header.php";
?>
<div>
    <div class="profile-edit-container">
        <a href="editprofile.php"><button class="btn btn-primary">Edit User Profile</button></a>
    </div>
    <div class="grid-container">
    <h1 class="h1">Your  submitted Available apartments</h1>
    <?php
    $query="SELECT * FROM `apartment` WHERE `a_status`=1";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="grid">
        <div class="grid-item">
            <h2><?php echo $row["title"]?></h2>
            <h2><?php echo $row["city"]?></h2>
            <p><?php echo $row["price"] ?></p>
            <p><?php echo $row["a_type"] ?></p>
            
    
            <a href="apartment-item.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">View</button></a>
            <a href="updateapartment.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Edit</button></a>
            <a href="deleteapartment.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Delete</button></a>
    
            
        </div>
        </div>
        <?php
    
    } ?>
    
    </div>
    <div class="grid-container">
    <h1 class="h1">Your  Purchased apartments</h1>

    <?php
    $query="SELECT * FROM `apartment` WHERE `a_status`=0";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        if($row["a_type"] == "Sale"){
        ?>
        <div class="grid">
        <div class="grid-item">
            <h2><?php echo $row["title"]?></h2>
            <h2><?php echo $row["city"]?></h2>
            <p><?php echo $row["price"] ?></p>
            <p><?php echo $row["a_type"] ?></p>
            
            <a href="apartment-item.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">View</button></a>
            <a href="deleteapartment.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Delete</button></a>
    
            
        </div>
        </div>
        <?php
        }
    } ?>
    </div>
    <div class="grid-container">
    <h1 class="h1">Your  Renting apartments</h1>
    <?php
    $query="SELECT * FROM `apartment` WHERE `a_status`=0";
    $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        if($row["a_type"] == "Rent"){
        ?>
        <div class="grid">
        <div class="grid-item">
            <h2><?php echo $row["title"]?></h2>
            <h2><?php echo $row["city"]?></h2>
            <p><?php echo $row["price"] ?></p>
            <p><?php echo $row["a_type"] ?></p>
            
    
            <a href="apartment-item.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">View</button></a>
            <a href="deleteapartment.php?id=<?php echo $row["aid"] ?>"><button class="btn btn-primary">Delete</button></a>
    
            
        </div>
        </div>
        <?php
        }
    } ?>
    </div>
    
    <div class="grid-container">
    <h1 class="h1">Your  Transactions</h1>
    <table border="1">
<?php
$pid = $_SESSION["user_id"];
$query = "SELECT * FROM payment WHERE `user_id` = '$pid'";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row["card_name"] ?></td>
        <td><?php echo $row["amount"] ?></td>
        <td><?php echo $row["dop"] ?></td>
        <td><?php echo $row["apartment_id"] ?></td>
        <td><?php echo $row["title"] ?></td>
        <td><a href="updatepayment.php?id=<?php echo $row['pid']; ?>" class="btn-edit">Change title</a></td>

    </tr>

<?php 
}
?>
</table>
<br><br>
    <!--give access to change only title    in admin panel give access to delete-->
    </div>
</div>