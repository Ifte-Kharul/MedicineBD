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
                        <?php 
                           if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                        </li>";
                           }else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                            </li>";
                           }
                         ?>
                        
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="cart_page.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_count() ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : <?php total_cart_price(); ?>/- </a>
                        </li>


                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                       <input type="submit" value="search" class='search-button' name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
    </div>