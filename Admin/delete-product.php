<?php 
include '../connect.php';

//get the id of admin to be deleteed


//echo "Deleate";

//check id and imagename set or not
if(isset($_GET['id'])AND isset($_GET['image_name']))
{
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];
 
   if($image_name !=""){
   $path="../img/products/".$image_name;
   //emove image
   $remove=unlink($path);
    
    $sql="DELETE FROM product WHERE id=$id";
    $res=mysqli_query($connect,$sql);
    if($res==true){
     
    echo '<script>alert("Product deleted successfully");window.location.href="Admin-View-product-list-Page.php";</script>';
    }
     else{
     
      echo '<script>alert("Faild to delete product");window.location.href="Admin-View-product-list-Page.php";</script>';
      }
    
    
    
    if($remove==false){
     echo '<script>alert("Faild to remove product image!");window.location.href="Admin-View-product-list-Page.php";</script>';
     }
  }
 

 
}else{
  echo '<script>window.location.href="Admin-View-product-list-Page.php";</script>';
  }
?>