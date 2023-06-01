<?php 
  include('../includes/connect.php');
  if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    $select_query="select * from categories where category_title ='$category_title'";
    $select_result=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($select_result);
    if($num>0){
      echo "<script>alert('This Category already present in database')</script>";
    }else{
      $insert_query= "insert into categories(category_title) values('$category_title')";
      $result= mysqli_query($con,$insert_query);
      if($result){
        echo "<script>alert('category added successfully')</script>";
    }
    
    }
  }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text bg-info " id="basic-addon1"><i class="fa-solid fa-receipt p-2"></i></span>
        </div>
        <input type="text" name="cat_title" class="form-control" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" name="insert_cat" class="bg-info p-3 border-0 m-3" value="Insert Categories">
        
      </div>
</form>