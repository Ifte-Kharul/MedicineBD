<?php 
if(isset($_GET['edit_com'])){
 $com_id=$_GET['edit_com'];
 $fetch_query="SELECT * from companies where company_id=$com_id";
 $fetch=mysqli_query($con,$fetch_query);
 $com_row=mysqli_fetch_assoc($fetch);
 $com_title=$com_row['company_title'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Companies</h1>
    <form action="" method="post">
<div class="form-outline w-50 m-auto mb-4">
            <label for="com_title" class="form-label">Company Title</label>
            <input type="text" value='<?php echo $com_title;?>' name="com_title" id="com_title" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Update Company" name="edit_com" class="px-15 py-2 btn btn-info">
        </div>

        </form>
</div>
<?php 
//updating Company title
if(isset($_POST['edit_com'])){
$com_title=$_POST['com_title'];
$update_query="UPDATE companies set company_title='$com_title' where company_id=$com_id";
$update=mysqli_query($con,$update_query);
if($update){
    echo "<script>alert('Company Updated')</script>";
            echo "<script>window.open('index.php?view_companies','_self')</script>";
}}
?>