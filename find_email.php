<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email =mysqli_real_escape_string($connect, $_POST[ 'email' ]);
 
 $sql_userdatabase = "Select * from customers where Email = '$email'  ";
$result_userdatabase = mysqli_query( $connect, $sql_userdatabase );

$sql_Admindatabase = "Select * from admin where email = '$email'  ";
$result_Admindatabase = mysqli_query( $connect, $sql_Admindatabase );

$sql_Doctordatabase = "Select * from doctor where Email = '$email' ";
$result_Doctordatabase = mysqli_query( $connect, $sql_Doctordatabase );
 
  if (strlen( $email ) == 0 ) {
 echo '<script>
 alert("Field is empty!");
 window.location.href="Login.html";
 </script>';
  
}else if ( mysqli_num_rows( $result_userdatabase ) <= 0 & 
    mysqli_num_rows( $result_Admindatabase ) <= 0 &
    mysqli_num_rows( $result_Doctordatabase ) <= 0 ) {

 echo '<script>
 alert("Your entered email is did not exist!");
 window.location.href="Forget-Password.html";
 </script>';
 
}else {
  $row_userdatabase = mysqli_fetch_array( $result_userdatabase );
 $row_admindatabase = mysqli_fetch_array( $result_Admindatabase );
 $row_Doctordatabase = mysqli_fetch_array( $result_Doctordatabase );
 
  if ( $row_userdatabase== true ) {
    
        $sb = "Reset password code";
        $msg = rand(00000,99999);
        $headers = "From: Aayurweda.com";
        mail($email, $sb, $msg, $headers);
   
         session_start();
         $_SESSION[ 'Rcode' ] = $msg;
         $_SESSION[ 'Remail' ] = $email;

 echo '<script>alert("We send a code to your email");window.location.href="Reset-Password.php";</script>';
  }
  
  else if ( $row_Doctordatabase== true ) {
    
        $sb = "Reset password code";
        $msg = rand(00000,99999);
        $headers = "From: Aayurweda.com";
        mail($email, $sb, $msg, $headers);
   
         session_start();
         $_SESSION[ 'Rcode' ] = $msg;
         $_SESSION[ 'Remail' ] = $email;

   echo '<script>alert("We send a code to your email");window.location.href="Reset-Password.php";</script>';
  }
    else if ( $row_admindatabase== true ) {
     
        $sb = "Reset password code";
        $msg = rand(00000,99999);
        $headers = "From: Aayurweda.com";
        mail($email, $sb, $msg, $headers);
   
         session_start();
         $_SESSION[ 'Rcode' ] = $msg;
         $_SESSION[ 'Remail' ] = $email;

     
 echo '<script>alert("We send a code to your email");window.location.href="Reset-Password.php";</script>';
     
  }else{
     
 echo '<script>
 alert("Something went wrong!");
 window.location.href="Forget-Password.html";
 </script>';
    }
}
 
 
 }else {
    echo '<script>window.location.href="Login.html";</script>';
  }
?>