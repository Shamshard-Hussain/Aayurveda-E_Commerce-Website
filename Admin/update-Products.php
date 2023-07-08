<?php
include '../connect.php';

if ( isset( $_GET[ 'id' ] )) {
  $id = $_GET[ 'id' ];

                             $sql ="SELECT * FROM product WHERE id=$id ";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
                           if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                            
                            $name= $row['name'];
                            $Price= $row['price'];
                            $diseaseType= $row['diseaseType'];
                            $info=$row['info'];
                            $current_image= $row['image'];
                            }
                           }

}else{
 header( "location:Admin-View-product-list-Page.php" );
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
 
  <script src="../js/Search-function.js"></script>   
  <link rel="stylesheet" href="../Css/Admin.css" />
  <script src="../js/sweetalert.min.js"></script>
 
</head>
<body>
<input type="checkbox" id="menu-toggle">
<div class="sidebar">
  <div class="side-header">
    <h3>A<span>ayurweda</span></h3>
  </div>
  <div class="side-content">
    <div class="profile">
      <div class="profile-img bg-img" style="background-image: url(../img/icons/icons8-system-administrator-male-80.png)"></div>
      <h4>Admin Panel</h4>
      <!-- <small>Admin Name</small>--> 
    </div>
    <div class="side-menu">
      <ul>
        <li> <a href="Admin-Home-Page.php" > <span ><img src="../img/icons/icons8-home-30.png"/></span> <small>Home</small> </a> </li>
        <li> <a href="Admin-Doctors-list-Page.php"> <span><img src="../img/icons/icons8-doctors-30 (1).png"/></span> <small>Doctors</small> </a> </li> 
        <li> <a href="Admin-View-user-list-Page.php"> <span><img src="../img/icons/icons8-people-30 (1).png"/></span> <small>Customers</small> </a> </li>
        <li> <a href="Admin-View-product-list-Page.php" class="active"> <span><img src="../img/icons/icons8-packing-30 (1).png"/></span> <small>Products</small> </a> </li>
        <li> <a href="Orders.php"> <span ><img src="../img/icons/icons8-shopping-cart-30.png"/></span> <small>Orders</small> </a> </li>
        <li> <a href="admin-feedback-view.php"> <span><img src="../img/icons/icons8-documents-30.png"/></span> <small>F&Q</small> </a> </li>

      </ul>
    </div>
  </div>
</div>
<div class="main-content">
  <header>
    <div class="header-content">
      <label for="menu-toggle"> <span><img src="../img/icons/icons8-menu-25.png"/></span> </label>
      <div class="header-menu" title="Search">
        <label for=""> 
          <!--<span ><img src="../img/icons/icons8-search-20.png"/></span>--> 
        </label>
        <div class="notify-icon" title="Email"> 
          <!-- <span><img src="../img/icons/icons8-secured-letter-20.png"/></span>
                        <span class="notify">4</span>--> 
        </div>
        <!--<div class="notify-icon"> <span><img src="../img/icons/icons8-doorbell-20.png"/></span> <span class="notify">3</span> </div>-->
       
        <div class="user" title="Logout" onclick="if (confirm('Log Out?')){window.location.href = 'Admin-logout.php';}
                else{event.stopPropagation(); event.preventDefault();};"> 
          <!--  <div class="bg-img" style="background-image: url(../img/Doctors/profile-user.png)"></div>--> 
          
          <span><img src="../img/icons/icons8-logout-rounded-up-20.png"/></span> <span>Logout</span> </div>
      </div>
  </header>
  <main>
    <div class="page-header">
      <h1>Product Form</h1>
      <small>Update </small> </div>
    <div class="page-content">

 <form  action="#" enctype="multipart/form-data" method="post">
        <!--Producr form-->
        <div class="add_Product_wrapper">
          <!--<div class="Product_title"> Product Form </div>-->
          <div class="Product_form">
            <div class="Product_info">
              <label>Product Name</label>
              <input type="text" placeholder="Enter Product Name" value="<?php echo $name?>" name="Pname" required>
            </div>

            <div class="Product_info">
              <label>Disease type</label>
              <input type="text" placeholder="Enter Disease type" value="<?php echo $diseaseType?>" name="Dtype" required>
            </div>


            <div class="Product_info">
              <label>Product Description</label>
              <textarea placeholder="Enter Product Description" name="info" required><?php echo $info?></textarea>
            </div>

            <div class="Product_info">
              <label>Price</label>
              <input type="number" min="0" name="price" value="<?php echo $Price?>" placeholder="Enter Product Price" required>
            </div>
           
            <div class="Product_info">
              <label>Product Image</label>
             <input type="file" id="image" name="image" accept="image/*" >
            </div>
           
           <div class="Product_info">
              <label>Image</label>
             <img id="preview" class="product_img" src="../img/products/<?php echo $current_image?>" alt="Preview Image" style="align-content: center; width: 100px;"><br>
            </div>
           
            
           
            <div class="Product_info">
              <input type="submit" name="submit" value="Update" class="product_form_btn">
            </div>
          </div>
        </div>
     </form>
     <?php
 if (isset($_POST['submit'])) {
$new_name = mysqli_real_escape_string( $connect, $_POST[ 'Pname' ] );
$Dtype = mysqli_real_escape_string( $connect, $_POST[ 'Dtype' ] );
$new_price = mysqli_real_escape_string( $connect, $_POST[ 'price' ] );
$new_info = mysqli_real_escape_string( $connect, $_POST[ 'info' ] );

 

 
  
  $select = mysqli_query( $connect, "SELECT * FROM product WHERE name='$name' " );
 
 
 
 if ( strlen( $name ) == 0 || strlen( $Dtype ) == 0 || strlen( $Price ) == 0 || strlen( $info ) == 0 ) {
 echo '<script>
 alert("Fields are empty!");window.location.href="Admin-Update-New-Doctor-Page.php";
 </script>';
}
 else if($new_name!=$name) {
  
         if ( mysqli_num_rows( $select ) ) {
         echo '<script>
         alert("Product already registered!");window.location.href="Admin-View-product-list-Page.php";
         </script>';
         }
 }
 else{
 
 
 
  if (isset($_FILES['image']['name'])) {
    $image_name = $_FILES['image']['name'];
  
    if ($image_name != "") {
      // Generate a unique filename using rand and current timestamp
      $ext = pathinfo($image_name, PATHINFO_EXTENSION);
      $image_name = $name . rand(0000, 9999) . '_' . time() . '.' . $ext;

      // Get source and destination paths
      $src_path = $_FILES['image']['tmp_name'];
      $dest_path = "../img/products/" . $image_name;

      // Upload new image
      $upload = move_uploaded_file($src_path, $dest_path);

      if ($upload == false) {
       echo '<script>
        alert("Failed to upload new image!");window.location.href="Admin-View-product-list-Page.php";
        </script>';
      // die();
      }

      if ($current_image != "") {
        // Remove old image
        $remove_path = "../img/products/" . $current_image;
        $remove = unlink($remove_path);

        if ($remove == false) {
          // Failed to remove old image
         echo '<script>
        alert("Failed to remove current image!");window.location.href="Admin-View-product-list-Page.php";
        </script>';
      // die();
        }
      }
    } else {
      $image_name = $current_image;
    }
  }

  $sql = "Update product set
             name='$new_name',
             image ='$image_name',
             diseaseType ='$Dtype',
             price=$new_price,
             info='$new_info'
            WHERE id=$id";
  $res = mysqli_query($connect, $sql);

  if ($res) {
   echo '<script>
        alert("Successfully Updated");window.location.href="Admin-View-product-list-Page.php";
        </script>';
    
  } else {
   echo '<script>
        alert("Failed to Update!");window.location.href="Admin-View-product-list-Page.php";
        </script>';
   
  }
   
 }
   } 
   ?>
     
     
     
     
    </div>
  </main>
</div>
</body>
</html>

 <script>
 document.querySelector('#image').addEventListener('change', function() {
  const preview = document.querySelector('#preview');
  const file = this.files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function() {
    preview.src = reader.result;
    preview.style.display = 'block';
  }, false);

  if (file) {
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (allowedTypes.indexOf(file.type) === -1) {
      alert('Invalid File Type. Only JPEG, PNG, and GIF files are allowed.');
      return;
    }
    reader.readAsDataURL(file);
  }
});
 </script>