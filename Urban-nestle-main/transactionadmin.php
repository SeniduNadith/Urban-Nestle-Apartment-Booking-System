<?php
include "headeradmin.php";?>
<br><br>


<table class="admin-table">
<thead>
    <th>ID</th>
    <th>Title</th>
    <th>Amount</th>
    <th>Date of Payment</th>
    <th>Delete</th>
</thead>
<?php
include "database.php";
?>
<table class="admin-table">
<?php

$query = "SELECT * FROM payment";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row["pid"] ?></td>
        <td><?php echo $row["title"] ?></td>
        <td><?php echo $row["amount"] ?></td>
        <td><?php echo $row["dop"] ?></td>
        <td><a href="deletepay.php?id=<?php echo $row['pid']; ?>" class="btn-delete">Delete</a></td>

    </tr>

<?php 
}
?>
</table>
<br><br><br><br><br>
