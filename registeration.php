<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$mail = mysqli_real_escape_string( $connect, $_POST[ 'email' ] );
$fname = mysqli_real_escape_string( $connect, $_POST[ 'fname' ] );
$lname = mysqli_real_escape_string( $connect, $_POST[ 'lname' ] );
$Phone = mysqli_real_escape_string( $connect, $_POST[ 'phone' ] );
$Dob = mysqli_real_escape_string( $connect, $_POST[ 'dob' ] );
$Gender = mysqli_real_escape_string( $connect, $_POST[ 'gender' ] );
$Home_no = mysqli_real_escape_string( $connect, $_POST[ 'homeNo' ] );
$SreetName = mysqli_real_escape_string( $connect, $_POST[ 'Sname' ] );
$City = mysqli_real_escape_string( $connect, $_POST[ 'cName' ] );
$password = mysqli_real_escape_string( $connect, md5( $_POST[ 'password' ] ) );
$Cpassword = mysqli_real_escape_string( $connect, md5( $_POST[ 'cpassword' ] ) );


if ( strlen( $fname ) == 0 || strlen( $lname ) == 0 || strlen( $Phone ) == 0 || strlen( $Dob ) == 0 ||strlen( $Gender ) == 0 ||strlen( $Home_no ) == 0 ||strlen( $SreetName ) == 0 ||strlen( $City ) == 0 ||strlen( $mail ) == 0 || strlen( $password ) == 0 || strlen( $Cpassword ) == 0 ) {
 echo '<script>
 alert("Fields are empty!");window.location.href="SignUp.html";
 </script>';
}else if ( !preg_match( "/^[A-Za-z]+$/", $fname ) ) {
?><script>alert("Please enter valid name!");window.location.href='SignUp.html';</script><?php
} else if ( !preg_match( "/^[A-Za-z]+$/", $lname ) ) {
?><script>alert("Please enter valid name!");window.location.href='SignUp.html';</script><?php
}else if ( !preg_match( "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $mail ) ) {
?><script>alert("Please enter valid email!");window.location.href='SignUp.html';</script><?php
} else if ( !preg_match( "/^[0-9]*$/", $Phone ) ) {
?><script>alert("Please enter valid phone number!");window.location.href='SignUp.html';</script><?php
} else if ( strlen( $password ) < 6 ) {
?><script>alert("Password is too short!");window.location.href='SignUp.html';</script><?php
} else if ( $password !== $Cpassword ) {
?><script>alert("Password is not matching!");window.location.href='SignUp.html';</script><?php
}else{
     $select = mysqli_query( $connect, "SELECT * FROM customers WHERE Email='$mail' " );
       if ( mysqli_num_rows( $select ) ) {
        
        echo '<script>
        alert("User already registered!");window.location.href="SignUp.html";
        </script>';
        
       } else{
        
        $sql_userdatabase = "Insert into customers
        (First_Name ,Last_Name, Phone, Email, Dob, Gender, Home_No, Street_name, City,password,img,status) values 
        ('$fname' , '$lname', '$Phone', '$mail', '$Dob', '$Gender', '$Home_no', '$SreetName', '$City','$password','profile-icon.png','Offline now')";

         if ( mysqli_query( $connect, $sql_userdatabase ) == true ) {
        
         echo '<script>
         alert("You have been sucessfully registered!");window.location.href="Login.html";
         </script>';
        
         }else{
         echo '<script>
         alert("Something went wrong!");window.location.href="SignUp.html";
         </script>';
         }
       }
 
}
 
}else {
    echo '<script>window.location.href="SignUp.html";</script>';
}