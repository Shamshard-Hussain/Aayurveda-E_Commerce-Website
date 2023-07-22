<?php
// Check if the image file was uploaded successfully
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
  // Get the temporary file name and path
  $tmpName = $_FILES["image"]["tmp_name"];

  // Generate a random 3-digit number for the file name
  $fileName = rand(0, 9999999999);
  $fileName = str_pad($fileName, 3, "0", STR_PAD_LEFT);

  // Get the file extension
  $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

  // Set the new file name and path
  $newName = $fileName . "." . $fileExt;
  $newPath = "../../img/uploads/" . $newName;

  // Move the uploaded file to the new location
  move_uploaded_file($tmpName, $newPath);

 
 session_start();
    if(isset($_SESSION['userid'])){
        include_once "../../connect.php";
        $outgoing_id = $_SESSION['userid'];
     
        $incoming_id =  $_SESSION['incoming_id'];
       // $message = mysqli_real_escape_string($connect, $_POST['message']);
        
       $sql = mysqli_query($connect,"INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,img)VALUES ({$incoming_id}, {$outgoing_id}, '{$message}' ,'{$newName}')") or die();
    }
 
 
 $sql2 = mysqli_query($connect, "SELECT * FROM doctor WHERE Resgistration_Number = {$incoming_id}");
        if(mysqli_num_rows($sql2) > 0){
        $row = mysqli_fetch_assoc($sql2);
        
            if($row['status'] == "Offline now") {
            
                     $email=$row['Email'];
                     $sb = "Your are offline";
                     $msg = "You have new message in Aayurweda.com.";
                     $headers = "From: Aayurweda.com";
                     mail($email, $sb, $msg, $headers);
             
          }
        }
 
 
 
    }
?>
