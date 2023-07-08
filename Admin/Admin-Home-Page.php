<?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
  <script src="../js/Search-function.js"></script>   
  <link rel="stylesheet" href="../Css/Admin.css" />
<link rel="stylesheet" href="../Css/Admin.css" />
 
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
        <li> <a href="Admin-Home-Page.php" class="active" > <span ><img src="../img/icons/icons8-home-30(1).png"/></span> <small>Home</small> </a> </li>
        <li> <a href="Admin-Doctors-list-Page.php" > <span><img src="../img/icons/icons8-doctors-30 (1).png"/></span> <small>Doctors</small> </a> </li>
        <li> <a href="Admin-View-user-list-Page.php"> <span><img src="../img/icons/icons8-people-30 (1).png"/></span> <small>Customers</small> </a> </li>
        <li> <a href="Admin-View-product-list-Page.php"> <span><img src="../img/icons/icons8-packing-30.png"/></span> <small>Products</small> </a> </li>
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
    </div>
  </header>
  <main>
    <div class="page-header">
      <h1>Dashboard</h1>
      <small>Home / Dashboard</small> </div>
    <div class="page-content">
     
      <div class="analytics">
       
       
       
        </div>
     
     
         <div class="dialog" id="Documents">
      <div class="box-dialog">
       
        <div class="box"> <img src="../img/icons/icons8-doctors-30.png" alt="">
          <h3>Doctors</h3>
          <p>Add doctors,view, search and manage doctor details</p>
          <a href="Admin-Doctors-list-Page.php" class="btn">View</a> </div>
       
           <div class="box"> <img src="../img/icons/icons8-people-30.png" alt="">
          <h3>Customers</h3>
          <p>Search and view customer  details</p>
          <a href="Admin-View-user-list-Page.php" class="btn">View</a> </div>
       
           <div class="box"> <img src="../img/icons/icons8-packing-30 (1).png" alt="">
          <h3>Products</h3>
          <p>Add products,view, search and manage product details</p>
          <a href="Admin-View-product-list-Page.php" class="btn">View</a> </div>
       
                  <div class="box"> <img src="../img/icons/icons8-shopping-cart-30 (1).png" alt="">
          <h3>Orders</h3>
          <p>Search , View and send conformation about orders</p>
          <a href="Orders.php" class="btn">View</a> </div>
       
                  <div class="box"> <img src="../img/icons/icons8-documents-30 (1).png" alt="">
          <h3>F&Q</h3>
          <p>View and replay to feedback</p>
          <a href="admin-feedback-view.php" class="btn">View</a> </div>
      
      </div>
    </div>
     
     
     
     
     
     </div>