 
 <?php
    include "headeradmin.php";
        if(isset($_GET['id'])){
            $id = $_GET['id'];

        
         $query= "select * from `review` where `rid`='$id'";
                     //execute the query,    $connection is from index.php
         $result = mysqli_query($connection, $query);
         if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            $row = mysqli_fetch_assoc($result);
        }
    }


if(isset($_POST['update_reply'])){
    
        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $answer = $_POST['answer'];
        $r_status = 0;


        $query = "update `review` set `answer`='$answer', `r_status` = '$r_status'
         where `rid` = $idnew";

        $result = mysqli_query($connection, $query);
        if(!$result){
           die("query failed".mysqli_error());
        }
        else{
            header('location:adminrep.php');
            exit;
        }
    
    }


    ?>

<div class="form-wrapper">
<form action="adminrep.php?id_new=<?php echo $row["rid"]; ?>" method="post" class="admin-contact-form">
    <?php
    echo "<h2>".$row["rid"]."</h2>";
    echo "<h2>".$row["name"]."</h2>";
    echo "<h2>".$row["email"]."</h2>";
    echo "<h2>".$row["phone_no"]."</h2>";
    echo "<h2>".$row["msg"]."</h2>";

?>
    <label>Reply</label><input type="text" id="answer" name="answer" required>
    </div>
    <input type="submit" class="btn-submit" name="update_reply" value="UPDATE">
</form>
</div>


</body>
</html>