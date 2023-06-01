<?php 
  include('../includes/connect.php');
  if(isset($_POST['insert_company'])){
    $company_title=$_POST['company_title'];
    $select_query="select * from companies where company_title ='$company_title'";
    $select_result=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($select_result);
    if($num>0){
      echo "<script>alert('This Company already present in database')</script>";
    }else{
      $insert_query= "insert into companies(company_title) values('$company_title')";
      $result= mysqli_query($con,$insert_query);
      if($result){
        echo "<script>alert('company added successfully')</script>";
    }
    
    }
  }
?>
<h2 class="text-center">Insert Company</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt p-2"></i></span>
        </div>
        <input type="text" name="company_title" class="form-control" placeholder="Insert Company" aria-label="brands" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-2 m-auto">
        
        <input type="submit" name="insert_company" class="bg-info p-3 border-0 m-3" value="Insert Company">
        
      </div>
</form>