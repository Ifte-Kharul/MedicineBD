<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap csslink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- bootstrap javascript link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- my css  -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    <title>Login Userr</title>
</head>

<body>

    <div class="container-fluid m-3">
        <h2 class='text-center'>Login User</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" ">
                <!-- User Name -->
                <div class=" form outline mb-3">
                    <label for="user_username" class="form-label">UserName</label>

                    <input type="text" name="user_username" id="user_username" class='form-control' placeholder="Enter Your username" required autocomplete="off">

            </div>

            <!-- password  -->
            <div class="form outline mb-3">
                <label for="user_password" class="form-label">Password</label>

                <input type="password" name="user_password" id="user_password" class='form-control' placeholder="Enter Your Password" required>
            </div>

            <div>
                <input type="submit" value="login" class="bg-info p-3 border-0" name="user_login">
                <p style="font-weight:bold ;">Don't have an account? <a href="user_registration.php">SignUp</a></p>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM user_table where user_username='$user_username'";
    $result = mysqli_query($con, $select_query);
    
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    $select_cart_query = "SELECT * FROM cart_details where ip_address='$user_ip'";
    $cart_result = mysqli_query($con, $select_cart_query);
    $cart_item_count = mysqli_num_rows($cart_result);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {

            if ($row_count == 1 and $cart_item_count == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfull')</script>";
                
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Password do not match')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credential')</script>";
    }
}

?>