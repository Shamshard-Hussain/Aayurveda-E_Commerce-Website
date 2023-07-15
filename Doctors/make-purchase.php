<?php

include '../connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $address = mysqli_real_escape_string( $connect, $_POST[ 'address' ] );
$City = mysqli_real_escape_string( $connect, $_POST[ 'cName' ] );
$postal_code = mysqli_real_escape_string( $connect, $_POST[ 'postal_code' ] );
 
$date = date("Y-m-d"); // Get the current date in YYYY-MM-DD format
$order_id = rand(0000,9999); // Generate a random order ID
 
 $user_id= $_SESSION['D_userid']; 
 $Useer_address="$address".","."$City";
 
 
 foreach ($_SESSION["cart"] as $key => $value) {
  $product_id=$value["product_id"];
  $name = $value["product_name"];
  $price = $value["product_price"];
  $quantity = $value["product_quantity"];
  $subtotal = $quantity * $price;

 $sql = "INSERT INTO orders (order_id, user_id,product_name,product_price,product_id, product_quantity, total) 
 VALUES ($order_id, $user_id,'$name','$price','$product_id', '$quantity', '$subtotal')";

  if ($connect->query($sql) === TRUE) {

  // echo "<script> alert('Product inserted successfully');window.location.href='manage-cart.php';</script>";
  } else {
   // echo "<script> alert('Failed to Purchase Products');window.location.href='manage-cart.php';</script>" . $connect->error;
  }
}

 $sql2 = "INSERT INTO send_order (order_id, user_id, address, pCode, confirmation) 
 VALUES ($order_id, $user_id,'$Useer_address','$postal_code','Pending')";

  if ($connect->query($sql2) === TRUE) {
echo "<script> 
        alert('Product Purchased Successfully');
        window.location.href='User-Bill.php?order_id={$order_id}&date={$date}';
      </script>";


   unset( $_SESSION[ "cart" ]);
  } else {
    echo "<script> alert('Failed to Purchase Products');window.location.href='manage-cart.php';</script>" ;
  }

 }else {
    echo '<script>window.location.href="manage-cart.php";</script>';
}