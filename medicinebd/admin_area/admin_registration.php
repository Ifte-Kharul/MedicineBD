<?php
    
    include('../includes/connect.php');
    include('../functions/common_functions.php');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../includes/my_links.php') ?>
    <style>
     body{
        overflow-x: hidden;
     }
    </style>
    <title>Admin Registraion</title>
</head>
<body>
    <div class="container-fluid m-3">
    <h3 class="text-center mb-5">Admin Registration</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="product_images/admin_reg.jpg" alt="reg" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                </div>
                <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>
                <div>
                <input type="submit" value="Register" name="admin_register" class="bg-info px-6 py-2 btn">
                <p class="small fw-bold">Already have an account? <a href="admin_login.php" class="text-decoration-none text-danger">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
    
</body>
</html>
<?php
 if(isset($_POST['admin_register'])){
    $admin_username= $_POST['username']; 
    $admin_email= $_POST['email']; 
    $admin_password= $_POST['password'];
    $hashed_password=password_hash($admin_password,PASSWORD_DEFAULT); 
    $conf_admin_password= $_POST['confirm_password']; 

    //select query 
    $select_query="SELECT * FROM admin_table where admin_name='$admin_username' or email='$admin_email'";
    $result= mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
     echo "<script>alert('Admin Already Exist')</script>";
     
     
    }elseif($conf_admin_password!=$admin_password){
     echo "<script>alert('Passwords do not match')</script>";
     // echo "<script>window.open('user_registration.php','_self')</script>";
    }
    else{
     $insert_query= "INSERT INTO admin_table (admin_name,email,password)
     VALUES('$admin_username','$admin_email','$hashed_password')";
     $execute_query=mysqli_query($con,$insert_query);
     if($execute_query){
        // $_SESSION['admin_username']=$admin_username;
         echo "<script>alert('Admin Registered Successfully')</script>";
         echo "<script>window.open('admin_login .php','_self')</script>";
        }
        else{
         die(mysqli_connect_error($con));

        } 
 
    }
 }

?>