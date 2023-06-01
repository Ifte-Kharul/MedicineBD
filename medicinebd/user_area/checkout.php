<?php
include('../includes/connect.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../includes/my_links.php') ?>


    <title>Checkout</title>
</head>

<body>
    <!--nav bar-->
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
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>



                    </ul>

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
                <a class='nav-link' href='user_login.php'>Login</a>
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
        <div class="col-md-12">
            <!-- products  -->
            <div class="row">
                <?php
                if (!isset($_SESSION['username'])) {
                    include('user_login.php');
                } else {
                    include('payment.php');
                }
                ?>






            </div>
            <!--row end-->


        </div>
        <!-- col end -->

    </div>
    <!--footer-->
    <?php include("../includes/footer.php"); ?>

</body>

</html>