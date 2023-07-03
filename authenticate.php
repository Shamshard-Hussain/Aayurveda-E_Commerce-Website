<?php
include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$email =mysqli_real_escape_string($connect, $_POST[ 'email' ]);
$password = mysqli_real_escape_string($connect, md5($_POST['password']) );

$sql_userdatabase = "Select * from customers where Email = '$email' and password='$password' ";
$result_userdatabase = mysqli_query( $connect, $sql_userdatabase );

$sql_Admindatabase = "Select * from admin where email = '$email' and password='$password' ";
$result_Admindatabase = mysqli_query( $connect, $sql_Admindatabase );

$sql_Doctordatabase = "Select * from doctor where Email = '$email' and password='$password' ";
$result_Doctordatabase = mysqli_query( $connect, $sql_Doctordatabase );
 
 if (strlen( $email ) == 0 || strlen( $password ) == 0) {
 echo '<script>
 alert("Fields are empty!");
 window.location.href="Login.html";
 </script>';
  
}else if ( mysqli_num_rows( $result_userdatabase ) <= 0 & 
    mysqli_num_rows( $result_Admindatabase ) <= 0 &
    mysqli_num_rows( $result_Doctordatabase ) <= 0 ) {

 echo '<script>
 alert("Your login credentials are invalid!");
 window.location.href="Login.html";
 </script>';
 
} else {
  $row_userdatabase = mysqli_fetch_array( $result_userdatabase );
 $row_admindatabase = mysqli_fetch_array( $result_Admindatabase );
 $row_Doctordatabase = mysqli_fetch_array( $result_Doctordatabase );
 
  if ( $row_userdatabase== true ) {
    
    session_start();
    $_SESSION[ 'email' ] = $email;
    $_SESSION[ 'lname' ] = $row_userdatabase[ 'Last_Name' ];
    $_SESSION[ 'userid' ] = $row_userdatabase[ 'Customer_ID' ];
    $_SESSION[ 'log' ] = '1';
   $login_id=$_SESSION[ 'userid' ];
   $sql = mysqli_query($connect, "UPDATE customers SET status = 'Active now' WHERE Customer_ID=$login_id");
 echo '<script>alert("Login successful");window.location.href="Users/index.php";</script>';
  }
  
  else if ( $row_Doctordatabase== true ) {
    
    session_start();
    $_SESSION[ 'D_email' ] = $email;
    $_SESSION[ 'D_name' ] = $row_Doctordatabase[ 'First_Name' ];
    $_SESSION[ 'D_lname' ] = $row_Doctordatabase[ 'Last_Name' ];
    $_SESSION[ 'D_userid' ] = $row_Doctordatabase[ 'Resgistration_Number' ];
    $_SESSION[ 'Doctor_log' ] = '1';
   
   $login_id=$_SESSION[ 'D_userid' ];
   $sql = mysqli_query($connect, "UPDATE doctor SET status = 'Active now' WHERE Resgistration_Number=$login_id");
   
 echo '<script>alert("Login successful");window.location.href="Doctors/index.php";</script>';
  }
    else if ( $row_admindatabase== true ) {
    
    session_start();
    $_SESSION[ 'Admin_log' ] = '1';
     
 echo '<script>alert("Login successful");window.location.href="Admin/Admin-Home-Page.php";</script>';
     
  }else{
     
 echo '<script>
 alert("Something went wrong!");
 window.location.href="Login.html";
 </script>';
    }
}
 
 
}else {
    echo '<script>window.location.href="Login.html";</script>';
  }
?>