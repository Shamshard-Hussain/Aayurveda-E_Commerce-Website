<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$mail = mysqli_real_escape_string( $connect, $_POST[ 'email' ] );
$msg = mysqli_real_escape_string( $connect, $_POST[ 'msg' ] );
 
 if (strlen( $msg ) == 0 ||strlen( $mail ) == 0 ) {
 echo '<script>
 alert("Fields are empty!");window.location.href="index.php";
 </script>';
}else if ( !preg_match( "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $mail ) ) {
?><script>alert("Please enter valid email!");window.location.href='index.php';</script><?php
}else{
 
  
  /*--send Feedback--*/
   $sql_userdatabase = "Insert into feedback(Email,Inquries) 
          values ('$mail','$msg' )";

  if ( mysqli_query( $connect, $sql_userdatabase ) == true ) {
    echo "<script> alert('Message send');window.location.href='index.php';</script>";
  } else {
    ?><script>alert("Faild to send Message");</script>
<?php
}
  
  
  
  
  
 }
 
 }else {
    echo '<script>window.location.href="index.php";</script>';
  }

?>