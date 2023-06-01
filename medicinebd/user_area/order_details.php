<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>SL No</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Stutus</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $username = $_SESSION['username'];
        $get_details = "SELECT * from user_table where user_username='$username'";
        $result_order_query = mysqli_query($con, $get_details);
        $row_data = mysqli_fetch_array($result_order_query);
        $user_id = $row_data['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_pending_order_query = "SELECT * from user_orders where user_id=$user_id and order_state='pending'";
                    $get_pending = mysqli_query($con, $get_pending_order_query);
                    $number=1;
                    while ($r = mysqli_fetch_assoc($get_pending)) {
                        $amount_due=$r['amount_due'];
                        $total_product=$r['total_products'];
                        $invoice_number=$r['invoice_number'];
                        $order_date=$r['order_date'];
                        
                        echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_product</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>Pending</td>
                        </tr>
        "; 
        $number++;
                    }
                }
            }
        }




        ?>


    </tbody>
</table>