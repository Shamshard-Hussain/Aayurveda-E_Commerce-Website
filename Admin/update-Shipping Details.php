<?php
   include '../connect.php';
 
if(isset($_GET['id']))  {
    $order_id = $_GET['id'];
        $sql="Update send_order set confirmation='delivered' where order_id=$order_id";
    $res=mysqli_query($connect,$sql);
    if($res==true){
     
    echo '<script>alert("confirmation send successfully");window.location.href="order-address.php";</script>';
    }
     else{
     
      echo '<script>alert("Faild to send product confirmation");window.location.href="order-address.php";</script>';
      }
} else {
     echo '<script>window.location.href="order-address.php";</script>';
}
 
