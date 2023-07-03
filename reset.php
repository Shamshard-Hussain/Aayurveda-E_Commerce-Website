<?php
include 'connect.php';
session_start();
if ( isset( $_SESSION[ 'Rcode' ] ) ) {
  include_once "connect.php";
  $code = $_SESSION[ 'Rcode' ];
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Rcode =mysqli_real_escape_string($connect, $_POST[ 'Code' ]);
$email =mysqli_real_escape_string($connect, $_POST[ 'email' ]);
$password = mysqli_real_escape_string($connect, md5($_POST['password']) );
$Cpassword = mysqli_real_escape_string( $connect, md5( $_POST[ 'cpassword' ] ) );

$sql_userdatabase = "Select * from customers where Email = '$email' ";
$result_userdatabase = mysqli_query( $connect, $sql_userdatabase );

$sql_Admindatabase = "Select * from admin where email = '$email' ";
$result_Admindatabase = mysqli_query( $connect, $sql_Admindatabase );

$sql_Doctordatabase = "Select * from doctor where Email = '$email' ";
$result_Doctordatabase = mysqli_query( $connect, $sql_Doctordatabase );
 
 if (strlen( $email ) == 0 || strlen( $password ) == 0 || strlen($Rcode)== 0 || strlen($Cpassword)== 0)  {
 echo '<script>
 alert("Fields are empty!");
 window.location.href="Forget-Password.html";
 </script>';
  
}else if($Rcode!=$code){
   echo '<script>
 alert("Your entered code is did not match!");
 window.location.href="Reset-Password.php";
 </script>';
  
 }else if($password !== $Cpassword){
   echo '<script>
 alert("Password is not matching with confirm password!");
 window.location.href="Reset-Password.php";
 </script>';
  
 }else if ( mysqli_num_rows( $result_userdatabase ) <= 0 & 
    mysqli_num_rows( $result_Admindatabase ) <= 0 &
    mysqli_num_rows( $result_Doctordatabase ) <= 0 ) {

 echo '<script>
 alert("Your entered email is did not exist!");
 window.location.href="Forget-Password.html";
 </script>';
 
} else {
  $row_userdatabase = mysqli_fetch_array( $result_userdatabase );
 $row_admindatabase = mysqli_fetch_array( $result_Admindatabase );
 $row_Doctordatabase = mysqli_fetch_array( $result_Doctordatabase );
 
  if ( $row_userdatabase== true ) {
    
    session_destroy();
    $sql = mysqli_query($connect, "UPDATE customers SET password ='$password' WHERE Email='$email' ");
    echo '<script>alert("Password Reset Successful");window.location.href="Login.html";</script>';
  }
  
  else if ( $row_Doctordatabase== true ) {
    
    session_destroy();
    $sql = mysqli_query($connect, "UPDATE doctor SET password = '$password' WHERE Email='$email' ");
   
 echo '<script>alert("Password Reset Successful");window.location.href="Login.html";</script>';
  }
    else if ( $row_admindatabase== true ) {
    
    session_destroy();
    $sql = mysqli_query($connect, "UPDATE admin SET password = '$password' WHERE email='$email' ");
    echo '<script>alert("Password Reset Successful");window.location.href="Login.html";</script>';
     
  }else{
     
 echo '<script>
 alert("Something went wrong!");
 window.location.href="Login.html";
 </script>';
    }
}
 
 
}
else {
    echo '<script>window.location.href="Login.html";</script>';
  }
 
 
 
 
}else{
    echo '<script>alert("Something went wrong!");window.location.href="Forget-Password.html";</script>';
  }





?>