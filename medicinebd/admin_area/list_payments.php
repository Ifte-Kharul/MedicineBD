<h3 class="text-center">All Paymets</h3>
<table class="table table-bordered ">
    <?php
    $payment_query="SELECT * from user_payments";
    $run_query=mysqli_query($con,$payment_query);
    $count=mysqli_num_rows($run_query);
    if($count==0){
        echo "<h3 class='text-center'>No payments to show</h3>";
    }else{
    ?>
    <thead class="bg-info text-center">
        <tr>
            <td>Serial NO</td>
            <td>Invoice Number</td>
            <td>Date</td>
            <td>Payment Mode</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $number=0;
        $total=0;
        while($row_order=mysqli_fetch_assoc($run_query)){
        $number++;
        $payment_id=$row_order['payment_id'];
        $order_id=$row_order['order_id'];
        $invoice_number=$row_order['invoice_number'];
        $amount=$row_order['amount'];
        $payment_mode=$row_order['payment_mode'];
        $date=$row_order['date'];
        $total+=$amount;
    
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $invoice_number; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $payment_mode; ?></td>
            <td><?php echo $amount; ?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    <tfoot class="bg-info">
        <tr>
        <td colspan="4" align="right">Total:</td>
        <td class="text-center"><b><?php echo $total; ?> /-</b></td>
    
        </tr>
    </tfoot>
        <?php

        
        }
        ?>
    
</table>