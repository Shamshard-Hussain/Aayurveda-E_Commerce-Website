<?php
include '../connect.php';
session_start();
$user_id= $_SESSION['userid']; 

if (isset($_FILES["image"])) {
  $file = $_FILES["image"];
  $file_size = $file["size"];
  $file_type = $file["type"];
  $file_error = $file["error"];
$current_image = mysqli_real_escape_string( $connect, $_POST[ 'current_image' ] );

  // Check if file size is within limits (e.g., 5MB)
  if ($file_size > 5 * 1024 * 1024) {
   
  }

  // Check if file type is allowed (e.g., JPG or PNG)
  if ($file_type != "image/jpeg" && $file_type != "image/png") {
   echo "<script> alert('allowed only JPG or PNG');window.location.href='User-Profile.php';</script>";
  }

  // Check if there are any errors in uploading the file
  else if ($file_error != UPLOAD_ERR_OK) {
    echo "<script> alert('there is an  error in uploading the file');window.location.href='User-Profile.php';</script>";
  }else{
   
   // Move the uploaded file to the destination directory
  $file_name = basename(rand(0000,9999).$file["name"]);
  $target_file = "../img/profile-pic/" . $file_name;
  move_uploaded_file($file["tmp_name"], $target_file);
   
       if($current_image!="profile-icon.png"){
       $remove_path= "../img/profile-pic/".$current_image;
       $remove= unlink($remove_path);
       if($remove==false){
        echo "<script> alert('Faild to remove current image');
        window.location.href='User-Profile.php'</script>";
       }
  }
 $sql = "update customers set img='$file_name' where Customer_ID=$user_id
    ";

  if ($connect->query($sql) === TRUE) {

   echo "<script> alert('Profile image updated successfully');window.location.href='User-Profile.php';</script>";
  } else {
    echo "<script> alert('Failed to update profile img');window.location.href='User-Profile.php';</script>";
  }
  
}
}else{
  echo "<script>window.location.href='User-Profile.php';</script>";
}
?>