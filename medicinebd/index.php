<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/my_links.php') ?>


    <title>MedicineBD</title>
</head>

<body>
    <?php include("includes/nav_bar.php"); ?>
    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">

            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
            </li>";
            }
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_area/user_login.php'>Login</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_area/logout.php'>Logout</a>
            </li>";
            }
            ?>
        </ul>
    </nav>
    <!-- Third Child-->
    <div class="bg-light">
        <h3 class="text-center">MedicineBD</h3>
        <p class="text-center">Medicine at doorstep</p>
    </div>
    <!-- Fourth Child-->
    <div class="row">
        <div class="col-md-10">
            <!-- products  -->
            <div class="row">
                <?php
                //search_products();
                // $ip = getIPAddress();  
                // echo 'User Real IP Address - '.$ip;  /41 
                // total_cart_price();
                cart();
                getProducts();
                getProductsbyCategory();
                getProductsbyCompany();
                //     $select_query= "SELECT * FROM products ORDER BY rand() limit 0,9";
                //     $result= mysqli_query($con,$select_query);
                //     while($row=mysqli_fetch_assoc($result)){
                //        $product_id=$row['product_id']; 
                //        $product_title=$row['product_title']; 
                //        $product_description=$row['product_description']; 
                //       // $product_keywords=$row['product_keywords']; 
                //        $category_id=$row['category_id']; 
                //        $company_id=$row['company_id']; 
                //        $product_image1=$row['product_image1']; 
                //        //$product_image2=$row['product_image2']; 
                //        //$product_image3=$row['product_image3']; 
                //        $product_price=$row['product_price']; 
                //        echo "<div class='col-md-4 mb-2'>
                //        <div class='card'>
                //            <img class='card-img-top mt-2' src='admin_area/product_images/$product_image1' alt='$product_title'>
                //            <div class='card-body'>
                //                <h5 class='card-title'>$product_title</h5>
                //                <h6 class='product_price'>৳ $product_price</h2>
                //                <p class='card-text'>$product_description</p>
                //                <a href='#' class='btn btn-info'>Add to Cart</a>
                //                <a href='#' class='btn btn-secondary'>View More</a>
                //            </div>
                //        </div>
                //    </div>";
                //     }
                ?>






            </div>
            <!--row end-->


        </div>
        <!-- col end -->
        <div class="col-md-2 bg-secondary p-0">
            <!-- side nav  -->
            <!--Medicine Companies to be displayed-->
            <ul class="navbar-nav me-auto text-center">

                <li class="nav-item bg-info p-3 text-center">

                    <a href="#" class="nav-link text-light">
                        <h4>Medicine Company</h4>
                    </a>

                </li>
                <?php

                getCompany();
                // $select_company="select * from companies";
                // $result_companies= mysqli_query($con,$select_company);

                // while($row_data=mysqli_fetch_assoc($result_companies)){
                //     $company_title= $row_data['company_title'];
                //     $company_id= $row_data['company_id'];
                //     echo "<li class='nav-item text-center'>

                //     <a href='index.php?company=$company_id' class='nav-link text-light'>$company_title</a>

                // </li>";
                // }
                ?>

            </ul>
            <!-- Categories to be displayed-->
            <ul class="navbar-nav me-auto text-center">

                <li class="nav-item bg-info p-3 text-center">

                    <a href="#" class="nav-link text-light">
                        <h4>Categories</h4>
                    </a>

                </li>
                <?php

                getCategories();

                // $select_categories="select * from categories";
                // $result_categories= mysqli_query($con,$select_categories);

                // while($row_data=mysqli_fetch_assoc($result_categories)){
                //     $category_title= $row_data['category_title'];
                //     $category_id= $row_data['category_id'];
                //     echo "<li class='nav-item text-center'>

                //     <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>

                // </li>";
                // }
                ?>

            </ul>

        </div>
    </div>
    <!--footer-->
    <?php include("includes/footer.php"); ?>

</body>

</html>