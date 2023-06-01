
<?php 
$session_username=$_SESSION['username'];
$get_user="SELECT * from user_table where user_username='$session_username'";
$result_user=mysqli_query($con,$get_user);
$user_info=mysqli_fetch_assoc($result_user);
$user_id=$user_info['user_id'];
// echo $user_id;
?>
<h3>My Orders</h3>
<table class="table table-bordered mt-5">
   <thead class="bg-info">
    <tr>
        <th>SL No</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/incomplete</th>
        <th>Stutus</th>
    </tr>
   </thead> 
 <tbody>
    <?php 
    $get_order_details="SELECT * from user_orders where user_id='$user_id'";
    $result_order=mysqli_query($con,$get_order_details);
    $number=1;
    while($row_orders=mysqli_fetch_assoc($result_order)){
        $order_id=$row_orders['order_id'];
        $amount_due=$row_orders['amount_due'];
        $invoice_number=$row_orders['invoice_number'];
        $total_product=$row_orders['total_products'];
        $order_date=$row_orders['order_date'];
        $order_state=$row_orders['order_state'];
        if($order_state=='pending'){
            $order_state='Incomplete';}
        else{
            $order_state='Completed';
        }
        echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$total_product</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_state</td>
        ";
        if($order_state=='Completed'){
            echo "<td>COD</td>
            </tr>";
        }else{
            echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
            </tr>";
        }
        $number++;
    }
    ?>
    
    
 </tbody>
</table>