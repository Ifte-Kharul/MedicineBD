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
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand custom" href="index.php">MedicineBD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user_area/user_registration.phpxa">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart_page.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_count() ?></sup></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?>/- </a>
                        </li> -->


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

    <div class="container">
        <div class="row">
            <form method="POST" action="">
                <table class="text-center m-2 table-bordered">

                    <tbody>
                        <!-- php code to get dynamic data  -->
                        <?php
                        // global $con;
                        //leb:
                        $ip = getIPAddress();
                        $total_price = 0;
                        $cart_price_query = "SELECT * FROM cart_details where ip_address='$ip'";
                        $result = mysqli_query($con, $cart_price_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {

                            echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Option</th>
                            </tr>
                        </thead>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];

                                $select_products = "SELECT * from products WHERE product_id='$product_id'";
                                $result_price = mysqli_query($con, $select_products);

                                while ($row_prod_price = mysqli_fetch_array($result_price)) {
                                    $product_price = array($row_prod_price['product_price']);
                                    $product_values = array_sum($product_price);
                                    $product_title = $row_prod_price['product_title'];
                                    $product_image1 = $row_prod_price['product_image1'];
                                    $price_table = $row_prod_price['product_price'];
                                    $total_price += $product_values;
                        ?>

                                    <tr>
                                        <td><?php echo $product_title; ?></td>
                                        <td> <img src='admin_area/product_images/<?php echo $product_image1; ?>' alt=<?php echo $product_image1; ?> class='cart-image'> </td>
                                        <?php
                                        if (isset($_POST['update_cart'])) {

                                            $ip = getIPAddress();
                                            $quantities = (int) $_POST['qty'];
                                            if ($quantities > 0) {
                                                $update_cart = "UPDATE cart_details set quantity='$quantities' where ip_address='$ip' and product_id='$product_id'";
                                                $result_update = mysqli_query($con, $update_cart);
                                                if ($result_update) {
                                                    $total_price = $total_price * $quantities;
                                                    $quantity = $quantities;
                                                    //goto leb;
                                                }
                                            }
                                        }
                                        ?>
                                        <td> <input type='text' name='qty' value='<?php echo $quantity ?>' style='width:50px; text-align:center;'> </td>

                                        <td><?php echo $price_table . 'x' . $quantity; ?></td>
                                        <!-- hidden prod id  -->
                                        <input type="hidden" name="id[]" value="<?php echo $product_id; ?>" />
                                        <td><input type='checkbox' name='removeitem[]' value="<?php echo $product_id; ?>"></td>
                                        <td>

                                            <input type='submit' value='Update Cart' name='update_cart' class='bg-info p-3 border-0  '>
                                            <input type='submit' value='Remove Cart' name='remove_cart' class='bg-info p-3 border-0  '>


                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                            // two while ends here 
                        } else {

                            echo "<h2 style='text-align:center;color:red'>Cart is Empty!</h2>";
                        }


                        ?>
                    </tbody>
                </table>

                <!-- Subtotal-->
                <div class='d-flex m-3'>
                    <?php
                    if ($result_count > 0) {
                        echo "<h4 class='px-3'>
                Subtotal: <strong class='text-info'> $total_price/- </strong>
            </h4>
            <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info p-3 border-0 '>
           <button class='bg-secondary p-3 border-0 text-light mx-2'><a href='user_area/checkout.php' style='color:white;text-decoration:none;'>CheckOut</a></button>";
                    } else {
                        echo "<input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info p-3 border-0 '></a>";
                    }

                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>


                </div>
        </div>
        </form>
        <!-- Function to remove cart Item-->
        <?php

        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "DELETE from cart_details where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart_page.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();
        ?>
    </div>





    <!--footer-->
    <?php include("includes/footer.php"); ?>

</body>

</html>