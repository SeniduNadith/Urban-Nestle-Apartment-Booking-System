<?php
    include "header.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    
     $query= "select * from `loan` where `lid`='$id'";
                 //execute the query,    $connection is from index.php
     $result = mysqli_query($connection, $query);
     if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
}



    //actual update logic
    if(isset($_POST['update_loan'])){
        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $fname = $_POST['fname'];
        $address = $_POST['address'];

        $query = "update `loan` set `fname`='$fname',`address`='$address' where `lid` = '$idnew' ";

        $result = mysqli_query($connection, $query);
        if(!$result){
           die("query failed".mysqli_error());
        }
        else{
            header('location:loanadmin.php');
            exit;
        }
    }



    ?>

<div class="form-wrapper">
<form action="updateloan.php?id_new=<?php echo $id; ?>" method="post" class="admin-contact-form">
    <div class="input-field">
    <label>Name</label><input type="text" name="fname"  value="<?php echo $row['fname']; ?>">
    </div><div class="input-field">
    <label>address</label><input type="text" name="address"  value="<?php echo $row['address']; ?>">
    </div>
    <input type="submit" class="btn-submit" name="update_loan" value="UPDATE">
</form>
</div>


</body>
</html>