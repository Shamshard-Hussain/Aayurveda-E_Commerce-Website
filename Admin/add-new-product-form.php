<?php
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $name = mysqli_real_escape_string( $connect, $_POST[ 'Pname' ] );
$Dtype = mysqli_real_escape_string( $connect, $_POST[ 'Dtype' ] );
$price = mysqli_real_escape_string( $connect, $_POST[ 'price' ] );
$info = mysqli_real_escape_string( $connect, $_POST[ 'info' ] );
//$image = mysqli_real_escape_string( $connect, $_POST[ 'image' ] );
 
$select = mysqli_query( $connect, "SELECT * FROM product WHERE name='$name' " );
 
 if ( strlen( $name ) == 0 || strlen( $Dtype ) == 0 || strlen( $price ) == 0 || strlen( $info ) == 0   ) {
 echo '<script>
 alert("Fields are empty!");window.location.href="Admin-Add-New-Products-Page";
 </script>';
}else{
  
// check if any rows were returned by the query
if (mysqli_num_rows($select) > 0) {
    // the name already exists in the table
 echo '<script>
         alert("Product already exists!");
         window.location.href="Admin-Add-New-Products-Page.php";
         </script>';

} else {
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
            $fileNameNew = $name. "." . $fileActualExt;
            $fileDestination = '../img/products/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
           
           
           $sql_productDatabase = "Insert into product
          (name,image ,diseaseType ,price, info) values 
          ('$name' ,'$fileNameNew' ,'$Dtype' ,$price, '$info')";

         if ( mysqli_query( $connect, $sql_productDatabase ) == true ) {
        
         echo '<script>
         alert("Product have been sucessfully add!");
         window.location.href="Admin-Add-New-Products-Page.php";
         </script>';
        
         }else{
         echo '<script>
         alert("Something went wrong!");
         window.location.href="Admin-Add-New-Products-Page.php";
         </script>';
         }
  
          } else {
           echo '<script>
                 alert("File is too big!");
                 window.location.href="Admin-Add-New-Products-Page.php";
                 </script>';
          }
        } else {
           echo '<script>
                 alert("There was an error uploading your file!");
                 window.location.href="Admin-Add-New-Products-Page.php";
                 </script>';
        }
      } else {
           echo '<script>
                 alert("You cannot upload files of this type!");
                 window.location.href="Admin-Add-New-Products-Page.php";
                 </script>';
      }
    }
}
  
 }

}else{echo '<script>window.location.href="Admin-Add-New-Products-Page.php";</script>';}
?>