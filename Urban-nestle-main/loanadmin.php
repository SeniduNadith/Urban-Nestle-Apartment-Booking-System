<?php
include "headeradmin.php";?>
<br><br>


<table class="admin-table">
<thead>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone No</th>
    <th>Amount</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<?php
include "database.php";
?>
<table class="admin-table">
<?php

$query = "SELECT * FROM loan";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row["lid"] ?></td>
        <td><?php echo $row["fname"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["phoneno"] ?></td>
        <td><?php echo $row["amount"] ?></td>
        <td><a href="updateloan.php?id=<?php echo $row['lid']; ?>" class="btn-delete">Edit</a></td>
        <td><a href="deleteloan.php?id=<?php echo $row['lid']; ?>" class="btn-delete">Delete</a></td>

    </tr>

<?php 
}
?>
</table>
<br><br><br><br><br>
