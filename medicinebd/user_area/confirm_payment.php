<?php
include('../includes/connect.php');
// include('../functions/common_functions.php');
session_start();
if(isset($_GET['order_id'])){
   $order_id= $_GET['order_id'];
   $select_order= "SELECT * from user_orders where order_id=$order_id";
   $result= mysqli_query($con,$select_order);
   $row_fetch=mysqli_fetch_assoc($result);
   $invoice_number= $row_fetch['invoice_number'];
   $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="INSERT into user_payments (order_id,invoice_number,amount,payment_mode)
    Values($order_id,$invoice_number,$amount,'$payment_mode')";
    $insert=mysqli_query($con,$insert_query);
    if($insert){
        echo "<script>alert('Your Order is placed')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_sql="UPDATE user_orders set order_state='Complete' where order_id=$order_id";
    $up_q=mysqli_query($con,$update_sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../includes/my_links.php') ?>
    <title>Payment Page</title>
</head>
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value=<?php echo $invoice_number; ?>>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value=<?php echo $amount_due; ?>>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select Payment Method</option>
                    <option value="COD">Cash on Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" class="bg-info py-2 px-3 border-0" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>