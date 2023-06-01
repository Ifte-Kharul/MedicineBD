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
    <?php include('../includes/my_links.php'); ?>
    <title>Register User</title>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class='text-center'>New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
              <form action="" method="post" enctype="multipart/form-data">
                <!-- User Name -->
                <div class="form outline mb-3">
                    <label for="user_username" class="form-label">UserName</label>
                    
                    <input type="text" name="user_username" id="user_username" class='form-control' placeholder="Enter Your username" required>

                </div>
                <!-- User Email -->
                <div class="form outline mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    
                    <input type="email" name="user_email" id="user_email" class='form-control' placeholder="Enter Your email" required>
                </div>
                <!-- user image  -->
                <div class="form outline mb-3">
                    <label for="user_image" class="form-label">Image</label>
                    
                    <input type="file" name="user_image" id="user_image" class='form-control' required>
                </div>
                <!-- password  -->
                <div class="form outline mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    
                    <input type="password" name="user_password" id="user_password" class='form-control' placeholder="Enter Your Password" required>
                </div>
                <!-- confirm password  -->
                <div class="form outline mb-3">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    
                    <input type="password" name="conf_user_password" id="conf_user_password" class='form-control' placeholder="Confirm Password" required>
                </div>
                <!-- User Address -->
                <div class="form outline mb-3">
                    <label for="user_address" class="form-label">address</label>
                    
                    <input type="text" name="user_address" id="user_address" class='form-control' placeholder="Enter Your Address" required>

                </div>
                <!-- contact field  -->
                <div class="form outline mb-3">
                    <label for="user_contact" class="form-label">Contact Number</label>
                    
                    <input type="text" name="user_contact" id="user_contact" class='form-control' placeholder="Enter Your Moblie Number" required>

                </div>
                <div >
                  <input type="submit" value="Register" class="bg-info p-3 border-0" name="user_register">
                  <p style="font-weight:bold ;">Already have an account? <a href="user_login.php">Login</a></p>
                </div>
              </form> 
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php  
    if(isset($_POST['user_register'])){
       $user_username= $_POST['user_username']; 
       $user_email= $_POST['user_email']; 
       $user_password= $_POST['user_password'];
       $hashed_password=password_hash($user_password,PASSWORD_DEFAULT); 
       $conf_user_password= $_POST['conf_user_password']; 
       $user_address= $_POST['user_address']; 
       $user_contact= $_POST['user_contact'];
       $user_ip=getIPAddress(); 

       //img handle
       $user_image= $_FILES['user_image']['name'];
       $user_image_tmp=$_FILES['user_image']['tmp_name'];
       move_uploaded_file($user_image_tmp,"user_images/$user_image");

       //select query 
       $select_query="SELECT * FROM user_table where user_username='$user_username' or user_email='$user_email'";
       $result= mysqli_query($con,$select_query);
       $row_count=mysqli_num_rows($result);
       if($row_count>0){
        echo "<script>alert('User Already Exist')</script>";
        
        
       }elseif($conf_user_password!=$user_password){
        echo "<script>alert('Passwords do not match')</script>";
        // echo "<script>window.open('user_registration.php','_self')</script>";
       }
       else{
        $insert_query= "INSERT INTO user_table (user_username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
        VALUES('$user_username','$user_email','$hashed_password','$user_image','$user_ip','$user_address','$user_contact')";
        $execute_query=mysqli_query($con,$insert_query);
        if($execute_query){
            echo "<script>alert('Data Inserted Successfully')</script>";
            // echo "<script>window.open('user_registration.php','_self')</script>";
           }
           else{
            die(mysqli_connect_error($con));

           } 
    
       }
     //selecting cart items
     $select_cart_items= "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
     $result_cart=mysqli_query($con,$select_cart_items);
     $rows_count=mysqli_num_rows($result_cart);
     if($rows_count>0){
        
        $_SESSION['username']=$user_username;
        echo "<script>alert('You Have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
     }else{
        echo "<script>window.open('../index.php','_self')</script>";
     }
       
    }

?>