<?php 
  $con=mysqli_connect("localhost","root","","medicinebd");
  if(!$con){
    die(mysqli_connect_error($con));
  }
?>