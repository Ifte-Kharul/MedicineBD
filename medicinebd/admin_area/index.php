<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Admin Area</title>
    <!-- <meta name="description" content=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap csslink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- bootstrap javascript link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!--first Child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand custom" href="#">MedicineBD</a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link fw-bold">Welcome <?php
                                                                            if (isset($_SESSION['admin_name'])) {
                                                                                echo $_SESSION['admin_name'];
                                                                            } else {
                                                                                echo 'Admin';
                                                                            }
                                                                            ?></a>
                        </li>
                    </ul>
                </nav>



            </div>
        </nav>
        <!--Second Child-->
        <div class="bg-light text-center">
            <h3>Manage Details</h3>
        </div>
    </div>
    <!--Third child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-5"><img src="../images/admin.png" alt="admin" class="admin_image">

                    <p class="text-light text-center"><?php
                                                        if (isset($_SESSION['admin_name'])) {
                                                            echo $_SESSION['admin_name'];
                                                        } else {
                                                            echo 'Admin';
                                                        }
                                                        ?></p>
                </div>
            <div class="button text-center">
                <button><a href="insert_products.php" class="nav-link text-light bg-info  p-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info  p-1">View Products</a></button>
                <button><a href="index.php?insert_categories" class="nav-link text-light bg-info  p-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info  p-1">View Categories</a></button>
                <button><a href="index.php?insert_company" class="nav-link text-light bg-info  p-1">Insert Company</a></button>
                <button><a href="index.php?view_companies" class="nav-link text-light bg-info  p-1">View Company</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info  p-1">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-light bg-info  p-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info  p-1">List Users</a></button>
                <button><a href="admin_logout.php" class="nav-link text-light bg-info  p-1">LogOut</a></button>
            </div>
        </div>
    </div>
    <!--fourth child-->
    <div class="container my-5">
        <?php
        if (isset($_GET['insert_categories'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_company'])) {
            include('insert_company.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_product'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_companies'])) {
            include('view_companies.php');
        }
        if (isset($_GET['edit_cat'])) {
            include('edit_categories.php');
        }
        if (isset($_GET['edit_com'])) {
            include('edit_companies.php');
        }
        if (isset($_GET['delete_cat'])) {
            include('delete_categories.php');
        }
        if (isset($_GET['delete_com'])) {
            include('delete_companies.php');
        }
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['delete_order'])) {
            include('delete_order.php');
        }
        ?>
    </div>
    <!--footer-->
    <?php include('../includes/footer.php') ?>
    <!-- Js Links -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>