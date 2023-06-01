<?php 
if(isset($_GET['delete_com'])){
    $delete_id=$_GET['delete_com'];
    $delete_query="DELETE from companies where company_id=$delete_id";
    $delete=mysqli_query($con,$delete_query);
    if($delete){
        echo "<script>alert('Company Deleted')</script>";
            echo "<script>window.open('index.php?view_companies','_self')</script>";
    }
}
?>