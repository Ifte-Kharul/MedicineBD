<?php 
if(isset($_GET['edit_cat'])){
 $cat_id=$_GET['edit_cat'];
 $fetch_query="SELECT * from categories where category_id=$cat_id";
 $fetch=mysqli_query($con,$fetch_query);
 $cat_row=mysqli_fetch_assoc($fetch);
 $cat_title=$cat_row['category_title'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Categories</h1>
    <form action="" method="post">
<div class="form-outline w-50 m-auto mb-4">
            <label for="cat_title" class="form-label">Category Title</label>
            <input type="text" value='<?php echo $cat_title;?>' name="cat_title" id="cat_title" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Update Category" name="edit_cat" class="px-15 py-2 btn btn-info">
        </div>

        </form>
</div>
<?php 
//updating Category title
if(isset($_POST['edit_cat'])){
$cat_title=$_POST['cat_title'];
$update_query="UPDATE categories set category_title='$cat_title' where category_id=$cat_id";
$update=mysqli_query($con,$update_query);
if($update){
    echo "<script>alert('Category Updated')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
}}
?>