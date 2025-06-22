<?php
    include "header.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    
     $query= "select * from `payment` where `pid`='$id'";
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
    if(isset($_POST['update_payment'])){
        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $title = $_POST['title'];

        $query = "update `payment` set `title`='$title' where `pid` = '$idnew' ";

        $result = mysqli_query($connection, $query);
        if(!$result){
           die("query failed".mysqli_error());
        }
        else{
            header('location:userprofile.php');
            exit;
        }
    }



    ?>

<div class="form-wrapper">
<form action="updatepayment.php?id_new=<?php echo $id; ?>" method="post" class="admin-contact-form">
    <div class="input-field">
    <label>Apartment Title</label><input type="text" name="title"  value="<?php echo $row['title']; ?>">
    </div>
    <input type="submit" class="btn-submit" name="update_payment" value="UPDATE">
</form>
</div>


</body>
</html>