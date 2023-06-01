<h3>Delete Account ?</h3>
<form action="" method="post">
    <div class="form-outline mb-4 w-50 m-auto ">
        <input type="submit" value="Delete" class="form-control bg-danger text-light" name="delete">
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" value="Don't Delete" class="form-control" name="not_delete">
    </div>
</form>
<?php 
$session_username=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query= "DELETE from user_table where user_username = '$session_username'";
    $res=mysqli_query($con,$delete_query);
    if($res){
        session_destroy();
        echo "<script>alert('Your Account is removed from database')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['not_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}
 ?>