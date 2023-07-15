<?php 
    session_start();
    if(isset($_SESSION['D_userid'])){
        include_once "../../../connect.php";
        $outgoing_chat_id = $_SESSION['D_userid'];
     
        $incoming_chat_id = mysqli_real_escape_string($connect, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($connect, $_POST['message']);
        if (!empty(trim($message))) {
            $sql = mysqli_query($connect, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_chat_id}, {$outgoing_chat_id}, '{$message}')") or die();
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
     
    }else{header("location: ../index.php");}


    
?>