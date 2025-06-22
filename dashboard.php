<?php
include "headeradmin.php";?>
<table>
    <tr>
<?php
include "database.php";

$query = "SELECT COUNT(`id`) as COUNT FROM user";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
?>
    
        <td><div class="dash"><h2><?php echo $row["COUNT"] ?></h2>   <h2>Total Users</h2></div></td>

<?php


$query = "SELECT COUNT(`rid`) as COUNT FROM review WHERE r_status=1";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
?>
    
        <td><div class="dash"><h2><?php echo $row["COUNT"] ?></h2>   <h2>UnAnswered Questions</h2></div></td>

<?php


$query = "SELECT COUNT(`aid`) as COUNT FROM apartment";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
?>
    
        <td><div class="dash"><h2><?php echo $row["COUNT"] ?></h2>   <h2>total Apartments</h2></div></td>

<?php


$query = "SELECT COUNT(`lid`) as COUNT FROM loan";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
?>
    
        <td><div class="dash"><h2><?php echo $row["COUNT"] ?></h2>   <h2>total Loans</h2></div></td>






</tr>

</table>
<br><br><br><br><br>
