<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * from user_table where user_username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['user_username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];}
    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_tmp_img = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_tmp_img,"user_images/$user_image");

        //update query
        $update_data = "UPDATE user_table set user_username='$user_name',user_email='$user_email',
        user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
        $update_excecute=mysqli_query($con,$update_data);
        if($update_excecute){
          echo "<script>alert('Data Updated Successfully')</script>";
          echo "<script>window.open('logout.php','_self')</script></script>";
        }
        else{
            echo "Error";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .update_img {
            width: 150px;

        }
    </style>
    <title>Edit Account</title>
</head>

<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" value=<?php echo $user_name; ?>>
        </div>
        <div class="form outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_email" value=<?php echo $user_email; ?>>
        </div>
        <div class="form outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="user_images/<?php echo $img_name; ?>" alt="" class="update_img">
        </div>
        <div class="form outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value=<?php echo $user_address; ?>>
        </div>
        <div class="form outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value=<?php echo $user_mobile; ?>>
        </div>
        <input type="submit" value="Update" name="user_update" class="bg-info p-3 border-0 my-2">
    </form>
</body>

</html>