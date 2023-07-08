  <script src="../js/sweetalert.min.js"></script>
<?php
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$mail = mysqli_real_escape_string( $connect, $_POST[ 'email' ] );
$fname = mysqli_real_escape_string( $connect, $_POST[ 'fname' ] );
$mname = mysqli_real_escape_string( $connect, $_POST[ 'mname' ] );
$lname = mysqli_real_escape_string( $connect, $_POST[ 'lname' ] );
$nic = mysqli_real_escape_string( $connect, $_POST[ 'nic' ] );
$regnumber = mysqli_real_escape_string( $connect, $_POST[ 'regnumber' ] );
$Phone = mysqli_real_escape_string( $connect, $_POST[ 'phone' ] );
$Gender = mysqli_real_escape_string( $connect, $_POST[ 'gender' ] );
$SpecialtySelect=mysqli_real_escape_string($connect,$_POST['specialtySelect']);
$bio = mysqli_real_escape_string( $connect, $_POST[ 'bio' ] );
$Home_no = mysqli_real_escape_string( $connect, $_POST[ 'homeNo' ] );
$SreetName = mysqli_real_escape_string( $connect, $_POST[ 'Sname' ] );
$City = mysqli_real_escape_string( $connect, $_POST[ 'cName' ] );
$password = mysqli_real_escape_string( $connect, md5( $_POST[ 'password' ] ) );
$Cpassword = mysqli_real_escape_string( $connect, md5( $_POST[ 'cpassword' ] ) );
 
  $select4 = mysqli_query( $connect, "SELECT * FROM customers WHERE Email='$mail' " );
  $select3 = mysqli_query( $connect, "SELECT * FROM doctor WHERE Nic_Number='$nic' " );
  $select2 = mysqli_query( $connect, "SELECT * FROM doctor WHERE Resgistration_Number=$regnumber " );
  $select = mysqli_query( $connect, "SELECT * FROM doctor WHERE Email='$mail' " );
 
 
if ( strlen( $fname ) == 0 || strlen( $lname ) == 0 || strlen( $mname ) == 0 || strlen( $Phone ) == 0 ||
     strlen( $nic ) == 0 ||strlen( $Gender ) == 0 ||strlen( $Home_no ) == 0 ||
     strlen( $SreetName ) == 0 ||strlen( $City ) == 0 ||strlen( $mail ) == 0 || 
    strlen( $password ) == 0 || strlen( $Cpassword ) == 0 ||strlen( $regnumber ) == 0 ||strlen( $SpecialtySelect ) == 0 ) {
 echo '<script>
 alert("Fields are empty!");window.location.href="Admin-Add-New-Doctor-Page.php";
 </script>';
}else if ( !preg_match( "/^[A-Za-z]+$/", $fname ) ) {
?><script>alert("Please enter valid first name!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
} else if ( !preg_match( "/^[A-Za-z]+$/", $lname ) ) {
?><script>alert("Please enter valid middle name!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
}else if ( !preg_match( "/^[A-Za-z]+$/", $mname ) ) {
?><script>alert("Please enter valid last name!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
} else  if ( !preg_match( '/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/', $nic ) ) {
?><script>alert("Please Enter valid nic number!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
}else if ( !preg_match( "/^[0-9]*$/", $Phone ) ) {
?><script>alert("Please enter valid phone number!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
}else if ( !preg_match( "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $mail ) ) {
?><script>alert("Please enter valid email!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
}else if ( strlen( $password ) < 6 ) {
?><script>alert("Password is too short!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
} else if ( $password !== $Cpassword ) {
?><script>alert("Password is not matching!");window.location.href='Admin-Add-New-Doctor-Page.php';</script><?php
}else if ( mysqli_num_rows( $select2 ) ) {
        
 
        echo '<script>
        alert("Doctor already registered!");window.location.href="Admin-Add-New-Doctor-Page.php";
        </script>';
        
}else if ( mysqli_num_rows( $select4 ) ) {
        
        echo '<script>
        alert("Doctor email already registered!");window.location.href="Admin-Add-New-Doctor-Page.php";
        </script>';
        
}else if ( mysqli_num_rows( $select ) ) {
        
        echo '<script>
        alert("Doctor email already registered!");window.location.href="Admin-Add-New-Doctor-Page.php";
        </script>';
        
}else if ( mysqli_num_rows( $select3 ) ) {
        
        echo '<script>
        alert("Doctor Nic Number already registered!");window.location.href="Admin-Add-New-Doctor-Page.php";
        </script>';
        
}else{
 

 
 if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
      $file = $_FILES['image'];
      $fileName = $file['name'];
      $fileTmpName = $file['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
      $fileType = $file['type'];

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 1000000) {
            $fileNameNew = $fname. "." . $fileActualExt;
            $fileDestination = '../img/Doctors/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
           
           
           $sql_doctorDatabase = "Insert into doctor
          (Resgistration_Number,First_Name ,Middle_Initials ,Last_Name, Nic_Number,phone, Email, Gender ,Specialty_Type ,Bio ,Image, Home_Number, Street_Name, City_Name,Password,status) values 
          ($regnumber ,'$fname' ,'$mname' ,'$lname', '$nic',$Phone, '$mail' ,'$Gender' ,'$SpecialtySelect' ,'$bio', '$fileNameNew', '$Home_no', '$SreetName', '$City','$password','Offline now')";

         if ( mysqli_query( $connect, $sql_doctorDatabase ) == true ) {
        
         echo '<script>
         alert("Doctor have been sucessfully registered!");
         window.location.href="Admin-Add-New-Doctor-Page.php";
         </script>';
        
         }else{
         echo '<script>
         alert("Something went wrong!");
         window.location.href="Admin-Add-New-Doctor-Page.php";
         </script>';
         }
           
           
           
            //header("Location:Admin-Add-New-Doctor-Page.php?uploadsuccess");
          } else {
           echo '<script>
                 alert("File is too big!");
                 window.location.href="Admin-Add-New-Doctor-Page.php";
                 </script>';
          }
        } else {
           echo '<script>
                 alert("There was an error uploading your file!");
                 window.location.href="Admin-Add-New-Doctor-Page.php";
                 </script>';
        }
      } else {
           echo '<script>
                 alert("You cannot upload files of this type!");
                 window.location.href="Admin-Add-New-Doctor-Page.php";
                 </script>';
      }
    }
  }
 

 
}else {
    echo '<script>window.location.href="Admin-Add-New-Doctor-Page.php";</script>';
  }

?>
