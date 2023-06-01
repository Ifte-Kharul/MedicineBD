<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../includes/my_links.php') ?>

    <style>
       body{
        overflow-x: hidden;
       }
    </style>
    <title>MedicineBD</title>
</head>

<body>
    <!-- NavBar  -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand custom" href="../index.php">MedicineBD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <?php 
                           if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='profile.php'>My Account</a>
                        </li>";
                           }else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='user_registration.php'>Register</a>
                            </li>";
                           }
                         ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="../cart_page.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_count() ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?>/- </a>
                        </li>


                    </ul>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class='search-button' name="search_data_product">
                    </form> -->
                </div>
            </div>
        </nav>
    </div>
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
                <a class='nav-link' href='logout.php'>Logout</a>
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
        <div class="col-md-2 my-1">
            <ul class="navbar-nav bg-secondary text-center">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#">
                        <h4>Your Profile</h4>
                    </a>
                </li>
                <?php 
                    $username=$_SESSION['username'];
                    $select_img_query= "SELECT * from user_table where user_username= '$username'";
                    $result_img=mysqli_query($con,$select_img_query);
                    $row_data=mysqli_fetch_assoc($result_img);
                    $img_name=$row_data['user_image'];
                    echo "<li class='nav-item bg-info'>
                    <a class='nav-link' href=''><img src='user_images/$img_name' alt='User Image' style='width: 90%; object-fit:contain;margin:auto; display:block;'></a>
                </li>";
                ?>
                
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="profile.php">
                        Pending Order
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="profile.php?edit_account">
                        Edit Account
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="profile.php?my_orders">
                        My Orders
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="profile.php?delete_account">
                        Delete Account
                    </a>
                </li>
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php 
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
                include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
                include('delete_acount.php');
            }
            if(isset($_GET['order_details'])){
                include('order_details.php');
            }

            ?>
        </div>
    </div>
    <!--footer-->
    <?php include("../includes/footer.php"); ?>

</body>

</html>