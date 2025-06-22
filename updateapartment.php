<?php
    include "header.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    
     $query= "select * from `apartment` where `aid`='$id'";
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
    if(isset($_POST['update_apartment'])){
        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        $title = $_POST['title'];
        $description = $_POST['description'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $price = $_POST['price'];


        $query = "update `apartment` set `title`='$title', `description` = '$description',`city`='$city',`address`='$address',`price`='$price'
         where `aid` = '$idnew' ";

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
<form action="updateapartment.php?id_new=<?php echo $id; ?>" method="post" class="admin-contact-form">
    <div class="input-field">
    <label>Apartment Title</label><input type="text" name="title"  value="<?php echo $row['title']; ?>">
    </div>
    <div class="input-field">
    <label>Description</label><input type="text" name="description"  value="<?php echo $row['description']; ?>">
    </div>
    <div class="input-field">
    <label>City</label><input type="text" name="city"  value="<?php echo $row['city']; ?>">
    </div>
    <div class="input-field">
    <label>Address</label><input type="text" name="city"  value="<?php echo $row['address']; ?>">
    </div>
    <div class="input-field">
    <label>Price</label><input type="text" name="price"  value="<?php echo $row['price']; ?>">
    </div>
    <input type="submit" class="btn-submit" name="update_apartment" value="UPDATE">
</form>
</div>


</body>
</html>