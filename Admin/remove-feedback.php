<?php 
include '../connect.php';


if(isset($_GET['Email']))
{
   $Email=$_GET['Email'];

    $sql="DELETE FROM Feedback WHERE Email='$Email'";
    $res=mysqli_query($connect,$sql);
    if($res==true){
     
    echo '<script>alert("Removed successfully");window.location.href="admin-feedback-view.php";</script>';
    }
     else{
     
      echo '<script>alert("Faild to delete Feedback");window.location.href="admin-feedback-view.php";</script>';
      }
    
 
}else{
  echo '<script>window.location.href="admin-feedback-view.php";</script>';
  }
?>