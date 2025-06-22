<?php
include "headeradmin.php";?>
<br><br>


<table class="admin-table">
<thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Update</th> 
    <th>Delete</th>
</thead>
<?php
include "database.php";

$query = "SELECT * FROM user";
$result = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["fname"] ?></td>
        <td><?php echo $row["lname"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["password"] ?></td>
        <td><a href="updateuser.php?id=<?php echo $row['id']; ?>" class="btn-edit">Update</a></td>
        <td><a href="deleteuser.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a></td>
    </tr>

<?php 
}
?>
</table>
<br><br><br><br><br>
