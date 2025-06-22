<html>
    <body>
    <table>
        <thead>
            <th>APARTMENT</th>
            <!--<th>USER</th>-->
            <th>AMOUNT</th>
            <th>payment_date</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
                $connection = require "database.php";
                 $query= "select * from `payment`";
                 //execute the query,    $connection is from index.php
                 $result = mysqli_query($connection, $query);
                 if(!$result){
                    die("query failed".mysqli_error());
                 }
                 else{
                    //print_r($result);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <!--inside php is return as this end at top, start bottom-->
                        <tr>
                            <td><?php echo $row['apartment_id']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['payment_date']; ?></td>
                            <td><?php echo $row['status']; ?></td>

                            <!--put update and delete  only to the admin panel -->
                            <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <!--<h4>Hello</h4>-->
                        <?php 
                                
                    }

                 }


            ?>
            </tbody>
            
        </table>
    </body>
</html>