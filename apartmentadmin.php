<?php
include "headeradmin.php";?>
<br><br>


<table class="admin-table">
<thead>
    <th>ID</th>
    <th>Title</th>
    <th>City</th>
    <th>Price</th>
    <th>type</th>
    <th>user ID</th>
    <th>Delete</th>
</thead>
<?php
include "database.php";
?>
<table class="admin-table">
<?php

$query = "SELECT * FROM apartment";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row["aid"] ?></td>
        <td><?php echo $row["title"] ?></td>
        <td><?php echo $row["city"] ?></td>
        <td><?php echo $row["price"] ?></td>
        <td><?php echo $row["a_type"] ?></td>
        <td><?php echo $row["id"] ?></td>
        <td><a href="deleteapartmentadmin.php?id=<?php echo $row['aid']; ?>" class="btn-delete">Delete</a></td>

    </tr>

<?php 
}
?>
</table>
<br><br><br><br><br>
