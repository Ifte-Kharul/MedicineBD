<h3 class="text-center">All Products</h3>
<table class="table table-bordered mt-5">
<thead class="bg-info">  
<tr>
        <th>Serial No</th>
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead> 
    <tbody>
        <?php 
            $get_products="SELECT * from products";
            $res= mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($res)){
                        $number++;
                        $product_id=$row['product_id']; 
                        $product_title=$row['product_title']; 
                        $product_status=$row['status'];                       
                        $product_image1=$row['product_image1'];                        
                        $product_price=$row['product_price']; ?>

                                               
                        <tr class='text-center'>
                        <td><?php echo $number;?></td>
                        <td><?php echo $product_id;?></td>
                        <td><?php echo $product_title;?></td>
                        <td><img src='product_images/<?php echo $product_image1;?>' class='admin_image'></td>
                        <td><?php echo $product_price;?></td>
                        <td><?php 
                         $get_count= "SELECT * from orders_pending where product_id = $product_id";
                         $res_count=mysqli_query($con,$get_count);
                         $row_count=mysqli_num_rows($res_count);
                         $q=0;
                         while($row=mysqli_fetch_assoc($res_count)){
                                $q += $row['quantity'];
                         }
                         echo $q;
                        ?></td>
                        <td><?php echo $product_status;?></td>
                        <td><a href='index.php?edit_product=<?php echo $product_id; ?>' style='color: green;'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_product=<?php echo $product_id; ?>' style='color: red;'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
        <?php
            }
        ?>
        
    </tbody>
</table>
