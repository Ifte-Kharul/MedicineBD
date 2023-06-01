<?php

    include("../includes/connect.php");
    if(isset($_POST['insert_product'])){
       $product_title= $_POST['product_title']; 
       $product_description= $_POST['description']; 
       $product_keywords= $_POST['product_keywords']; 
       $product_category= $_POST['product_category']; 
       $product_company= $_POST['product_company']; 
       $product_price= $_POST['product_price'];
       $product_status='true';
       //gettimestamp
         $time= time();
       //accesing image 
       $product_image1= $time.$_FILES['product_image1']['name']; 
       $product_image2= $time.$_FILES['product_image2']['name']; 
       $product_image3= $time.$_FILES['product_image3']['name']; 
       //accesing image tmn name
       $temp_image1= $_FILES['product_image1']['tmp_name']; 
       $temp_image2= $_FILES['product_image2']['tmp_name']; 
       $temp_image3= $_FILES['product_image3']['tmp_name']; 
       //checking emply condition
       if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_company=='' or $product_price=='' 
       or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<sctrip>alert('Please fill all available field')</sctrip>";
        exit();
       }else{
            move_uploaded_file($temp_image1,"product_images/$product_image1");
            move_uploaded_file($temp_image2,"product_images/$product_image2");
            move_uploaded_file($temp_image3,"product_images/$product_image3");

            //insert query
            $insert_products= "INSERT INTO products (product_title,product_description,product_keywords,category_id,
            company_id,product_image1,product_image2,product_image3,product_price,date,status) 
            VALUES('$product_title','$product_description','$product_keywords',$product_category,$product_company,'$product_image1',
            '$product_image2','$product_image3',$product_price,NOW(),'$product_status')";

            $result = mysqli_query($con,$insert_products);
            if($result){
                echo "<script>alert('Successfully Inserted the products')</script>";
            }
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- bootstrap javascript link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    <title>Insert Products-Admin Dashboard</title>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_title" >Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Enter Product Title" autocomplete="off" required>
            </div>   
            <!-- description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="description" >Description</label>
                <input type="text" name="description" id="description" class="form-control"
                 placeholder="Enter Product Description" autocomplete="off" required>
            </div>  
            <!-- keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_keywords" >Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                 placeholder="Enter Product Keywords" autocomplete="off" required>
            </div>
            <!-- Categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    // echo "<option value=''>Select Category</option>";
                      $select_query= "SELECT * from categories";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){

                        $catergory_title= $row['category_title'];
                        // echo $catergory_title;
                        $catergory_id= $row['category_id'];
                        echo "<option value='$catergory_id'>$catergory_title</option>";
                      }
                    ?>
                    <!-- <option value="">Select Cat1</option>
                    <option value="">Select Cat1</option>
                    <option value="">Select Cat1</option> -->
                </select>
            </div>
            <!-- Company-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_company" id="" class="form-select">
                    <option value="">Select Brand1</option>
                    <?php
                    // echo "<option value=''>Select Category</option>";
                      $select_query= "SELECT * from companies";
                      $result_query=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){

                        $company_title= $row['company_title'];
                        // echo $catergory_title;
                        $company_id= $row['company_id'];
                        echo "<option value='$company_id'>$company_title</option>";
                      }
                    ?>
                </select>
            </div>
            <!-- Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_image1" >Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                 required>
            </div>
            <!-- Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_image2" >Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                 required>
            </div>
            <!-- Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_image3" >Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                 required>
            </div>
            <!-- price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label" for="product_price" >Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                 placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>