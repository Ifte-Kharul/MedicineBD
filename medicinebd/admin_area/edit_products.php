<?php
   if(isset($_GET['edit_product'])){
     $edit_id=$_GET['edit_product'];
     $get_data="SELECT * from products where product_id = $edit_id";
     $result=mysqli_query($con,$get_data);
     $row=mysqli_fetch_assoc($result);
     $prod_title= $row['product_title'];
     $prod_desc = $row['product_description'];
     $prod_keywords = $row['product_keywords'];
     $catergory_id = $row['category_id'];
     $company_id =$row['company_id'];
     $prod_img1= $row['product_image1'];
     $prod_img2= $row['product_image2'];
     $prod_img3= $row['product_image3'];
     $prod_price= $row['product_price'];
     
    //fetching category name and Company name
    $cat_query="SELECT * from categories where category_id=$catergory_id";
    $run_cat=mysqli_query($con,$cat_query);
    $cat_info=mysqli_fetch_assoc($run_cat);
    $cat_name=$cat_info['category_title'];
    //company
    $com_query="SELECT * from companies where company_id=$company_id";
    $run_com=mysqli_query($con,$com_query);
    $com_info=mysqli_fetch_assoc($run_com);
    $com_name=$com_info['company_title'];
   } 
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" value='<?php echo $prod_title; ?>' name="product_title" id="product_title" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" value='<?php echo $prod_desc; ?>' name="product_desc" id="product_desc" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product Keywords</label>
            <input type="text" value='<?php echo $prod_keywords; ?>' name="product_keyword" id="product_keyword" class="form-control" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" id="product_category" class="form-select" required>            
                <option style="font-weight: bold;" value="value='<?php echo $catergory_id; ?>'"><?php echo $cat_name; ?></option>
                <?php

                $select_query = "SELECT * from categories";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $catergory_title = $row['category_title'];
                    $catergory_id = $row['category_id'];
                    echo "<option value='$catergory_id'>$catergory_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_company" class="form-label">Company</label>
                <select name="product_company" id="product_company" class="form-select" required>
                    <option style="font-weight: bold;" value="<?php echo $company_id; ?>"><?php echo $com_name; ?></option>
                    <?php
                    // echo "<option value=''>Select Category</option>";
                      $select_query= "SELECT * from companies";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){

                        $company_title= $row['company_title'];
                        
                        $company_id= $row['company_id'];
                        echo "<option value='$company_id'>$company_title</option>";
                      }
                    ?>
                </select>
         </div>
         <div class="form outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
            <input type="file" class="form-control" name="product_image1" id="product_image1" required >
            <img src="product_images/<?php echo $prod_img1; ?>" alt="" style="height: 100px;">
            </div>
            
        </div>
         <div class="form outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" class="form-control" name="product_image2" id="product_image2" required >
            <img src="product_images/<?php echo $prod_img2; ?>" alt="" style="height: 100px;">
            </div>
            
        </div>
         <div class="form outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" class="form-control" name="product_image3" id="product_image3" required >
            <img src="product_images/<?php echo $prod_img3; ?>" alt="" style="height: 100px;">
            </div>
            
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" value="<?php echo $prod_price; ?>" name="product_price" id="product_price" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Confirm" name="edit_product" class="px-15 py-2 btn btn-info">
        </div>
    </form>
</div>

<?php
    if(isset($_POST['edit_product'])){
       $product_title= $_POST['product_title']; 
       $product_description= $_POST['product_desc']; 
       $product_keywords= $_POST['product_keyword']; 
       $product_category= $_POST['product_category']; 
       $product_company= $_POST['product_company']; 
       $product_price= $_POST['product_price'];
        //accesing image 
        $product_image1= $_FILES['product_image1']['name']; 
        $product_image2= $_FILES['product_image2']['name']; 
        $product_image3= $_FILES['product_image3']['name']; 
        //accesing image tmn name
        $temp_image1= $_FILES['product_image1']['tmp_name']; 
        $temp_image2= $_FILES['product_image2']['tmp_name']; 
        $temp_image3= $_FILES['product_image3']['tmp_name']; 
        move_uploaded_file($temp_image1,"product_images/$product_image1");
        move_uploaded_file($temp_image2,"product_images/$product_image2");
        move_uploaded_file($temp_image3,"product_images/$product_image3");

        //query to update product
        $update_prods="UPDATE products set product_title='$product_title',product_description = '$product_description',
        product_keywords ='$product_keywords',category_id=$catergory_id,company_id=$company_id,product_image1='$product_image1',
        product_image2='$product_image2',product_image3='$product_image3',product_price=$product_price where product_id = $edit_id";

        $res_up=mysqli_query($con,$update_prods);
        if($res_up){
            echo "<script>alert('Data Updated')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

    }

?>