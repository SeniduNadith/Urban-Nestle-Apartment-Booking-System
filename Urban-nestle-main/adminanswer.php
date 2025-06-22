<?php
include "database.php";
include "headeradmin.php";


$query="SELECT * FROM `review` WHERE `r_status`=1";
$result = mysqli_query($connection,$query);
echo "<h1 align='center'>Unanswered Questions</h1>";
while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="admin-grid">
    <div class="admin-grid-item">
        <h2 class="admin-text"><?php echo $row["email"]?></h2>
        <h2 class="admin-text"><?php echo $row["name"]?></h2>
        <p class="admin-text"><?php echo $row["phone_no"] ?></p>
        <p class="admin-text"><?php echo $row["msg"] ?></p>
        

        <a href="adminrep.php?id=<?php echo $row["rid"] ?>"><button class="admin-btn" >view</button></a>
        <a href="admindel.php?id=<?php echo $row["rid"] ?>"><button class="admin-btn">Delete</button></a>

    </div>
    </div>
    <?php

}

//reply : 
//if answered part : gone/drop $status = 0
