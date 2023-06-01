<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
if($_GET['user_id']){
    $user_id=$_GET['user_id'];

}

$ip_address= getIPAddress();
$total_price=0;
$select_query="SELECT * from cart_details WHERE ip_address='$ip_address'";
$result=mysqli_query($con,$select_query);
$invoice_number= mt_rand();
$status='pending';

$count_product=mysqli_num_rows($result);

while($row_price=mysqli_fetch_array($result)){
    $product_id=$row_price['product_id'];
    $select_product="SELECT * from products WHERE product_id=$product_id";
    $result_product=mysqli_query($con,$select_product);
    while($row_prod_price=mysqli_fetch_array($result_product)){
    //     $product_price= array($row_prod_price['product_price']);
    //    $product_price=array_sum($product_price);
    //     echo $product_price ." /-";
    $product_price= (int)$row_prod_price['product_price'];
     $total_price +=$product_price;
     
    }
    
}
//getting quantity
$get_cart="SELECT * FROM cart_details where ip_address='$ip_address'";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity!=1){
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}else{
    $subtotal =$total_price;
}

// echo $total_price;
$insert_orders="INSERT INTO user_orders (user_id,product_id,amount_due,invoice_number,total_products,order_date,order_state)
VALUES($user_id,$product_id,$subtotal,$invoice_number,$quantity,NOW(),'$status') ";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Order Submitted Succesfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//order pending table
$insert_pending_orders="INSERT INTO orders_pending (user_id,invoice_number,product_id,quantity,order_status)
VALUES($user_id,$invoice_number,$product_id,$quantity,'$status') ";
$result_pending_query=mysqli_query($con,$insert_pending_orders);
//Deleting from Cart Table
$delete_query="DELETE from cart_details where ip_address='$ip_address'";
$run_delete_query=mysqli_query($con,$delete_query);

?>

