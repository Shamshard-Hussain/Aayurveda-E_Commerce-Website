<?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}?>
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
      <small>Add </small> </div>
    <div class="page-content">

 <form  action="add-new-product-form.php" enctype="multipart/form-data" method="post">
        <!--Producr form-->
        <div class="add_Product_wrapper">
          <!--<div class="Product_title"> Product Form </div>-->
          <div class="Product_form">
            <div class="Product_info">
              <label>Product Name</label>
              <input type="text" placeholder="Enter Product Name" name="Pname" required>
            </div>

            <div class="Product_info">
              <label>Disease type</label>
              <input type="text" placeholder="Enter Disease type" name="Dtype" required>
            </div>


            <div class="Product_info">
              <label>Product Description</label>
              <textarea placeholder="Enter Product Description" name="info" required></textarea>
            </div>

            <div class="Product_info">
              <label>Price</label>
              <input type="number" min="0" name="price" placeholder="Enter Product Price" required>
            </div>
           
            <div class="Product_info">
              <label>Product Image</label>
             <input type="file" id="image" name="image" accept="image/*" required>
            </div>
           
           <img id="preview" class="product_img" src="#" alt="Preview Image" style="display: none; width: 100px;">             <br> 
            <div class="Product_info">
              <input type="submit" value="Add" class="product_form_btn">
            </div>
          </div>
        </div>
     </form>
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