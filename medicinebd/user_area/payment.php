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
    <title>Payment Page</title>
    <style>
        img{
            width: 100%;
        }
    </style>
</head>
<?php 
    $ip=getIPAddress();
    $get_user= "SELECT * from user_table where user_ip='$ip'";
    $result_query=mysqli_query($con,$get_user);
    $data=mysqli_fetch_array($result_query);
    $user_id=$data['user_id'];
?>
<body>
    <?php ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6"><a href="https://www.bkash.com/app/" target="_blank"><img src="../images/bkash.svg"></a></div>
        <div class="col-md-6"><a href="order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">Payment Ofline</h2></a></div>
    </div>
</body>

</html>