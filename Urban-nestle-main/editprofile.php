<?php
    include "header.php";
        if(isset($_SESSION["user_id"])){
            $id = $_SESSION["user_id"];

        
         $query= "select * from `user` where `id`='$id'";
                     //execute the query,    $connection is from index.php
         $result = mysqli_query($connection, $query);
         if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?> 


    <?php
    //actual update logic
    if(isset($_POST['update_user'])){
        if($_POST["password"] !== $_POST["repassword"]){
            echo "Passwords don't match";
            exit;
        }else{

        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $password = $_POST['password'];


        $query = "update `user` set `fname`='$fname', `lname` = '$lname',`password`='$password'
         where `id` = $idnew";

        $result = mysqli_query($connection, $query);
        if(!$result){
           die("query failed".mysqli_error());
        }
        else{
            header('location:userprofile.php');
            exit;
        }
    }}



    ?>

<div class="form-wrapper">
<form action="editprofile.php?id_new=<?php echo $id; ?>" method="post" class="admin-contact-form">
    <div class="input-field">
    <label>First Name</label><input type="text" name="f_name"  value="<?php echo $row['fname']; ?>">
    </div>
    <div class="input-field">
    <label>Last Name</label><input type="text" name="l_name"  value="<?php echo $row['lname']; ?>">
    </div>
    <div class="input-field">
    <label>Password</label><input type="text" name="password" required>
    </div>
    <div class="input-field">
    <label>Confirm Password</label><input type="text" name="repassword" required>
    </div>
    <input type="submit" class="btn-submit" name="update_user" value="UPDATE">
</form>
</div>


</body>
</html>