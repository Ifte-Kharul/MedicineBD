<?php 
if(isset($_GET['delete_cat'])){
    $delete_id=$_GET['delete_cat'];
    $delete_query="DELETE from categories where category_id=$delete_id";
    $delete=mysqli_query($con,$delete_query);
    if($delete){
        echo "<script>alert('Category Deleted')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>


