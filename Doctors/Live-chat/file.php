<?php
// Check if the image file was uploaded successfully
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
  // The file was uploaded successfully
  $fileName = "image_" . rand(000000,999999);
  $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

  // Set the new file name and path
  $newName = $fileName . "." . $fileExt;
  $newPath = "../../img/uploads/" . $newName;

  // Move the uploaded file to the new location
  move_uploaded_file($_FILES["image"]["tmp_name"], $newPath);

 
 session_start();
    if(isset($_SESSION['D_userid'])){
        include_once "../../connect.php";
        $outgoing_chat_id = $_SESSION['D_userid'];
     
        $incoming_chat_id =  $_SESSION['incoming_chatid'];
       // $message = mysqli_real_escape_string($connect, $_POST['message']);
        
       $sql = mysqli_query($connect,"INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg,img)VALUES ({$incoming_chat_id}, {$outgoing_chat_id}, '{$message}' ,'{$newName}')") or die();

    }
         $sql2 = mysqli_query($connect, "SELECT * FROM doctor WHERE Resgistration_Number = {$incoming_chat_id}");
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
     
       $sql3 = mysqli_query($connect, "SELECT * FROM customers WHERE Customer_ID = {$incoming_chat_id}");
       if(mysqli_num_rows($sql3) > 0){
       $row3 = mysqli_fetch_assoc($sql3);
        
            if($row3['status'] == "Offline now") {
            
                     $mail=$row3['Email'];
                     $sb = "Your are offline";
                     $msg = "You have new message in Aayurweda.com.";
                     $headers = "From: Aayurweda.com";
                     mail($mail, $sb, $msg, $headers);
             
          } 
 
       }
 
 
 
    }
else {
   echo '<script>alert("Failed to send img");</script>'; }
?>
