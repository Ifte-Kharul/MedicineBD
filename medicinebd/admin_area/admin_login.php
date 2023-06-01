
<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
if(isset($_SESSION['admin_name'])){
    echo "<script>window.open('index.php','_self')</script>";
}
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
    <title>Admin Login</title>
</head>
<body>
    <div class="container-fluid m-3">
    <h3 class="text-center mb-5">Admin Login</h3>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-xl-5">
            <img src="product_images/admin_login.jpg" alt="login" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                
                <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                </div>
                
                <div>
                <input type="submit" value="Login" name="admin_login" class="bg-info px-6 py-2 btn">
                <p class="small fw-bold">Don't you have an account? <a href="admin_registration.php" class="text-decoration-none text-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
    
</body>
</html>
<?php 
if (isset($_POST['admin_login'])) {
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $select_query = "SELECT * FROM admin_table where email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count==0){
        echo "<script>alert('Email not found')</script>";
    }else{
        $row_data=mysqli_fetch_assoc($result);
        $_SESSION['email'] = $admin_email;
        if (password_verify($admin_password, $row_data['password'])){
            $_SESSION['admin_name']=$row_data['admin_name'];
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else{
            echo "<script>alert('Password do not match')</script>";
        }
    }
}
?>