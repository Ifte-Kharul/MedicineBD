<?php 
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    $delete_query="DELETE from products where product_id=$delete_id";
    $delete=mysqli_query($con,$delete_query);
    if($delete){
        echo "<script>alert('Product Deleted')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>