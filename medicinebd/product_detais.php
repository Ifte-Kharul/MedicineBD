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
    <!-- bootstrap csslink -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- bootstrap javascript link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- my css  -->
    <link rel="stylesheet" href="styles.css">


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

            <?php
            //search_products();
            cart();
            view_details();
            getProductsbyCategory();
            getProductsbyCompany();

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


            ?>

        </ul>

    </div>
    </div>
    <!--footer-->
    <?php include("includes/footer.php"); ?>

</body>

</html>