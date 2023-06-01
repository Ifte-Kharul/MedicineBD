<h3 class="text-center">All Orders</h3>
<table class="table table-borderd text-center">
    <thead class="bg-info">
        <?php
        $order_query="SELECT * from user_orders";
        $order=mysqli_query($con,$order_query);
        $count= mysqli_num_rows($order);
        if($count==0){
            echo "<h3 class='text-center'>No Orders to Show</h3>";
        }else{
            
        
        ?>
        <tr>
            <td>Serial No</td>
            <td>User Name</td>
            <td>Product ID</td>
            <td>Due Amount</td>
            <td>Invoice Number</td>
            <td>Total Products</td>
            <td>Order Date</td>
            <td>Status</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $num=0;
           while($row=mysqli_fetch_assoc($order)){
            $num++;
            $product_id=$row['product_id'];
            $order_id=$row['order_id'];
            $user_id=$row['user_id'];
            $amount_due=$row['amount_due'];
            $invoice_number=$row['invoice_number'];
            $total_products=$row['total_products'];
            $order_date=$row['order_date'];
            $order_state=$row['order_state'];
            if($order_state=='Complete'){
                $order_status='COD';
            }else{
                $order_status='Pending';
            }
            //user
            $user_query="SELECT * from user_table where user_id=$user_id";
            $user=mysqli_query($con,$user_query);
            $row_user=mysqli_fetch_assoc($user);
            $user_name=$row_user['user_username'];
           

        
        ?>
        <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $amount_due; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $total_products; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><a href='index.php?delete_order=<?php echo $order_id; ?>' style='color: red;'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
       } } ?>
    </tbody>
</table>