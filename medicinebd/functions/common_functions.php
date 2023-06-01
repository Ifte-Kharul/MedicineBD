<?php 
    
    // include("./includes/connect.php");

function getProducts()
{
      global $con;
      //isset check
      if(!isset($_GET['category'])){

        if(!isset($_GET['company'])){
            if(isset($_GET['search_data_product'])){ 
                $user_search_data=$_GET['search_data'];
                 $select_query= "SELECT * FROM products where product_keywords LIKE '%$user_search_data%'";
            // $result= mysqli_query($con,$search_query);
            }else
            {$select_query= "SELECT * FROM products ORDER BY rand() limit 0,9";
            }
    
                    $result= mysqli_query($con,$select_query);
                    if(mysqli_num_rows($result)==0){
                        echo "<h3>No Product Found</h3>";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                       $product_id=$row['product_id']; 
                       $product_title=$row['product_title']; 
                       $product_description=$row['product_description']; 
                      // $product_keywords=$row['product_keywords']; 
                       $category_id=$row['category_id']; 
                       $company_id=$row['company_id']; 
                       $product_image1=$row['product_image1']; 
                       //$product_image2=$row['product_image2']; 
                       //$product_image3=$row['product_image3']; 
                       $product_price=$row['product_price']; 
                       echo "<div class='col-md-4 mb-2'>
                       <div class='card'>
                           <img class='card-img-top' src='admin_area/product_images/$product_image1' alt='$product_title'>
                           <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <h6 class='product_price'>৳ $product_price</h2>
                               <p class='card-text desc'>$product_description</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                               <a href='product_detais.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                           </div>
                       </div>
                   </div>";
                    }}}
}
function get_all_product(){
    global $con;
    if(isset($_GET['search_data_product'])){ 
        $user_search_data=$_GET['search_data'];
         $select_query= "SELECT * FROM products where product_keywords LIKE '%$user_search_data%'";
    // $result= mysqli_query($con,$search_query);
    }else{$select_query= "SELECT * FROM products ORDER BY rand()";}
    
    $result= mysqli_query($con,$select_query);
    if(mysqli_num_rows($result)==0){
        echo "<h3>No Product Found</h3>";
    }
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id']; 
        $product_title=$row['product_title']; 
        $product_description=$row['product_description']; 
       // $product_keywords=$row['product_keywords']; 
        $category_id=$row['category_id']; 
        $company_id=$row['company_id']; 
        $product_image1=$row['product_image1']; 
        //$product_image2=$row['product_image2']; 
        //$product_image3=$row['product_image3']; 
        $product_price=$row['product_price']; 
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img class='card-img-top' src='admin_area/product_images/$product_image1' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <h6 class='product_price'>৳ $product_price</h2>
                <p class='card-text desc'>$product_description</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_detais.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
     }
}

 function getCompany(){
    global $con;
    $select_company="select * from companies";
    $result_companies= mysqli_query($con,$select_company);
    // $row_data=mysqli_fetch_assoc($result_companies);
    // echo $row_data['company_title'];
    while($row_data=mysqli_fetch_assoc($result_companies)){
        $company_title= $row_data['company_title'];
        $company_id= $row_data['company_id'];
        echo "<li class='nav-item text-center'>

        <a href='index.php?company=$company_id' class='nav-link text-light'>$company_title</a>

    </li>";
    }
 }
 function getCategories(){
    global $con;
    $select_categories="select * from categories";
                    $result_categories= mysqli_query($con,$select_categories);
                   
                    while($row_data=mysqli_fetch_assoc($result_categories)){
                        $category_title= $row_data['category_title'];
                        $category_id= $row_data['category_id'];
                        echo "<li class='nav-item text-center'>

                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    
                    </li>";
                    }
 }

 //getting unique categories
 function getProductsbyCategory()
{
      global $con;
      //isset check
     
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
                    $select_query= "SELECT * FROM products WHERE category_id='$category_id'";
                    $cat_name_query="SELECT category_title FROM categories WHERE category_id='$category_id'";
                                        $cat_name_result= mysqli_query($con,$cat_name_query);
                                        if($cat_name_result){
                                            $row=mysqli_fetch_assoc($cat_name_result);
                                            $category_name=$row['category_title'];
                                        }
                    $result= mysqli_query($con,$select_query);
                    $num_of_rows= mysqli_num_rows($result);
                    if($num_of_rows==0){
                       echo "<h2 class='no_stock_text'>No Products available in<b style='color:red;'> $category_name </b>category</h2>";
                    }
                    while($row=mysqli_fetch_assoc($result)){
                       $product_id=$row['product_id'];
                        
                       $product_title=$row['product_title']; 
                       $product_description=$row['product_description']; 
                      // $product_keywords=$row['product_keywords']; 
                       $category_id=$row['category_id']; 
                       $company_id=$row['company_id']; 
                       $product_image1=$row['product_image1']; 
                       //$product_image2=$row['product_image2']; 
                       //$product_image3=$row['product_image3']; 
                       $product_price=$row['product_price']; 
                       echo "<div class='col-md-4 mb-2'>
                       <div class='card'>
                           <img class='card-img-top mt-2' src='admin_area/product_images/$product_image1' alt='$product_title'>
                           <div class='card-body'>
                               <h5 class='card-title'>$product_title</h5>
                               <h6 class='product_price'>৳ $product_price</h2>
                               <p class='card-text'>$product_description</p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                               <a href='product_detais.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                           </div>
                       </div>
                   </div>";
                    }}}

                    function getProductsbyCompany()
                    {
                          global $con;
                          //isset check
                         
                            if(isset($_GET['company'])){
                                $company_id=$_GET['company'];
                                        $select_query= "SELECT * FROM products WHERE company_id='$company_id'";
                                        $com_name_query="SELECT company_title FROM companies WHERE company_id='$company_id'";
                                        $com_name_result= mysqli_query($con,$com_name_query);
                                        if($com_name_result){
                                            $row=mysqli_fetch_assoc($com_name_result);
                                            $company_name=$row['company_title'];
                                        }
                                        $result= mysqli_query($con,$select_query);
                                        $num_of_rows= mysqli_num_rows($result);
                                        if($num_of_rows==0){
                                           echo "<h2 class='no_stock_text'>No stock for <b style='color:red;'>$company_name</b> Medicine Company</h2>";
                                        }
                                        while($row=mysqli_fetch_assoc($result)){
                                           $product_id=$row['product_id'];
                                            
                                           $product_title=$row['product_title']; 
                                           $product_description=$row['product_description']; 
                                          // $product_keywords=$row['product_keywords']; 
                                           $category_id=$row['category_id']; 
                                           $company_id=$row['company_id']; 
                                           $product_image1=$row['product_image1']; 
                                           //$product_image2=$row['product_image2']; 
                                           //$product_image3=$row['product_image3']; 
                                           $product_price=$row['product_price']; 
                                           echo "<div class='col-md-4 mb-2'>
                                           <div class='card'>
                                               <img class='card-img-top mt-2' src='admin_area/product_images/$product_image1' alt='$product_title'>
                                               <div class='card-body'>
                                                   <h5 class='card-title'>$product_title</h5>
                                                   <h6 class='product_price'>৳ $product_price</h2>
                                                   <p class='card-text'>$product_description</p>
                                                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                                   <a href='product_detais.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                                               </div>
                                           </div>
                                       </div>";
                                        }}}

                    
function view_details(){
     global $con;
      //isset check
      if(isset($_GET['product_id'])){
      if(!isset($_GET['category'])){

        if(!isset($_GET['company'])){
            $product_id=$_GET['product_id'];
            if(isset($_GET['search_data_product'])){ 
                $user_search_data=$_GET['search_data'];
                 $select_query= "SELECT * FROM products where product_keywords LIKE '%$user_search_data%'";
            // $result= mysqli_query($con,$search_query);
            }else
            {
                
                $select_query= "SELECT * FROM products WHERE product_id='$product_id'";
            }
    
                    $result= mysqli_query($con,$select_query);
                    
                    while($row=mysqli_fetch_assoc($result)){
                       $product_id=$row['product_id']; 
                       $product_title=$row['product_title']; 
                       $product_description=$row['product_description']; 
                      // $product_keywords=$row['product_keywords']; 
                       $category_id=$row['category_id']; 
                       $company_id=$row['company_id']; 
                       $product_image1=$row['product_image1']; 
                       $product_image2=$row['product_image2']; 
                       $product_image3=$row['product_image3']; 
                       $product_price=$row['product_price']; 
                       echo "<div class='row'>
                       <!-- single prod -->
                       <div class='col-md-4'>
                           <!-- card  -->
                           <div class='card'>
                                      <img class='card-img-top' src='admin_area/product_images/$product_image1' alt='$product_title'>
                                      <div class='card-body'>
                                          <h5 class='card-title'>$product_title</h5>
                                          <h6 class='product_price'>৳ $product_price</h2>
                                         
                                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                          <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                      </div>
                                  </div>
                       </div>
                       <div class='col-md-8'>
                           
                           <div class='row'>
                               <div class='col-md-12'><h4 class='text-center text-info mb-5'>Product Description</h4></div>
                               <div class='col-md-12'><p>$product_description</p></div>
                               <div class='col-md-12'>
                                   <h4 class='text-center text-info mb-5'>Related Images</h4>
                               </div>
                               <div class='col-md-6'> <img class='card-img-top' src='admin_area/product_images/$product_image2' alt='product_title'></div>
                               <div class='col-md-6'> <img class='card-img-top' src='admin_area/product_images/$product_image3' alt='product_title'></div>
                           </div>
                       </div>";
                    }
                }
            }
        }
    }
    
    

    //get IP address
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    } 

    //cart function

function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details where ip_address = '$ip' and product_id=$get_product_id";
        $result= mysqli_query($con,$select_query);
        $num_of_rows= mysqli_num_rows($result);
        if($num_of_rows>0){
            echo "<script>alert('This Item Already Present inside cat')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        //    echo "<div class='alert'>
        //         <span class='closebtn' onclick='close()'>&times;</span>
        //              This is an alert box.
        //         </div>";
        }else{
            $insert_query= "INSERT INTO cart_details (product_id,ip_address,quantity) values ($get_product_id,'$ip',1)";
            $result= mysqli_query($con,$insert_query);

            echo "<script>alert('This Item Inserted to the Cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

function cart_item_count(){
    global $con;
    if(isset($_GET['add_to_cart'])){
        
        $ip = getIPAddress();
        // $get_product_id=$_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details where ip_address = '$ip'";
        $result= mysqli_query($con,$select_query);
        $count_cart_items =mysqli_num_rows($result);
        }else{
            $ip = getIPAddress();
            // $get_product_id=$_GET['add_to_cart'];
            $select_query = "SELECT * FROM cart_details where ip_address = '$ip'";
            $result= mysqli_query($con,$select_query);
            $count_cart_items =mysqli_num_rows($result);
        }
        echo $count_cart_items;
    }
    function total_cart_price(){
        global $con;
        $ip = getIPAddress();
        $total_price=0;
        $cart_price_query= "SELECT * FROM cart_details where ip_address='$ip'";
        $result= mysqli_query($con,$cart_price_query);
        while($row=mysqli_fetch_array($result)){
            $product_id = $row['product_id'];
            $select_products="SELECT * from products WHERE product_id='$product_id'";
            $result_price = mysqli_query($con,$select_products);
            
            while($row_prod_price=mysqli_fetch_array($result_price)){
                       $product_price=array($row_prod_price['product_price']);
                       $product_values = array_sum($product_price);
                        $total_price += $product_values;
            }
        }
        echo $total_price;
    }

// function search_products()
// {
//     global $con;
//      if(isset($_GET['search_data_product'])){ 
//         $user_search_data=$_GET['search_data'];
//     $search_query= "SELECT * FROM products where product_keywords LIKE '%$user_search_data%'";
//      $result= mysqli_query($con,$search_query);
//      while($row=mysqli_fetch_assoc($result)){
//         $product_id=$row['product_id']; 
//         $product_title=$row['product_title']; 
//         $product_description=$row['product_description']; 
//                       // $product_keywords=$row['product_keywords']; 
//         $category_id=$row['category_id']; 
//         $company_id=$row['company_id']; 
//         $product_image1=$row['product_image1']; 
//                        //$product_image2=$row['product_image2']; 
//                        //$product_image3=$row['product_image3']; 
//         $product_price=$row['product_price']; 
//         echo "<div class='col-md-4 mb-2'>
//         <div class='card'>
//             <img class='card-img-top mt-2' src='admin_area/product_images/$product_image1' alt='$product_title'>
//             <div class='card-body'>
//                 <h5 class='card-title'>$product_title</h5>
//                 <h6 class='product_price'>৳ $product_price</h2>
//                 <p class='card-text'>$product_description</p>
//                  <a href='#' class='btn btn-info'>Add to Cart</a>
//                 <a href='#' class='btn btn-secondary'>View More</a>
//             </div>
//         </div>
//      </div>";
//      }}
// }

//get user order details
function get_user_order_details(){
    global $con;
    $username= $_SESSION['username'];
    $get_details= "SELECT * from user_table where user_username='$username'";
    $result_order_query=mysqli_query($con,$get_details);
    while($row_data=mysqli_fetch_array($result_order_query)){
        $user_id= $row_data['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_pending_order_query="SELECT * from user_orders where user_id=$user_id and order_state='pending'";
                    $get_pending=mysqli_query($con,$get_pending_order_query);
                    $row_count=mysqli_num_rows($get_pending);
                    if($row_count>0){
                        echo "<h3 class='text-center'>You Have $row_count Pending Items</h3>
                        <p class='text-center'><a href='profile.php?order_details'>Order Details</a></p>";
                    }else{
                        echo "<h3 class='text-center text-muted'>You Have No Pending Items</h3>
                        <p class='text-center'><a href='../index.php'>Explore Products</a></p>
                        ";
                    }

                }  
            }
        }
    }
}

?>