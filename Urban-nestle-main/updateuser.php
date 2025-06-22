    <?php
    include "headeradmin.php";
        if(isset($_GET['id'])){
            $id = $_GET['id'];

        
         $query= "select * from `user` where `id`='$id'";
                     //execute the query,    $connection is from index.php
         $result = mysqli_query($connection, $query);
         if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            $row = mysqli_fetch_assoc($result);
        }
    }else{
        echo "No id recordrd";
    }

    ?> 


    <?php
    //actual update logic
    if(isset($_POST['update_user'])){

        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "update `user` set `fname`='$fname', `lname` = '$lname',`email`='$email',`password`='$password'
         where `id` = $idnew";

        $result = mysqli_query($connection, $query);
        if(!$result){
           die("query failed".mysqli_error());
        }
        else{
            header('location:users.php?update_msg=You have succesfully updated');
        }
    }



    ?>

<div class="form-wrapper">
<form action="updateuser.php?id_new=<?php echo $id; ?>" method="post" class="admin-contact-form">
    <div class="input-field">
    <label>First Name</label><input type="text" name="f_name"  value="<?php echo $row['fname']; ?>">
    </div>
    <div class="input-field">
    <label>Last Name</label><input type="text" name="l_name"  value="<?php echo $row['lname']; ?>">
    </div>
    <div class="input-field">
    <label>Email</label><input type="email" name="email"  value="<?php echo $row['email']; ?>">
    </div>
    <div class="input-field">
    <label>Password</label><input type="text" name="password"  value="<?php echo $row['password']; ?>">
    </div>
    <input type="submit" class="btn-submit" name="update_user" value="UPDATE">
</form>
</div>


</body>
</html>