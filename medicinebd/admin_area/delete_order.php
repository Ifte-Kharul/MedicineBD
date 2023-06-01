<?php 
if(isset($_GET['delete_order'])){
    $delete_order_id=$_GET['delete_order'];
    $delete_query="DELETE from user_orders where order_id=$delete_order_id";
    $delete=mysqli_query($con,$delete_query);
    if($delete){
        echo "<script>alert('Order Deleted')</script>";
        echo "<script>window.open('index.php?list_orders','_self')</script>";
    }
}
?>