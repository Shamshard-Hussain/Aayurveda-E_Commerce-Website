<?php
   include '../connect.php';
session_start();
if ($_SESSION['log'] == '')
{
    header("location:../Login.html");
}else{

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

  //get the Search key word
  $search = mysqli_real_escape_string( $connect, $_POST[ 'search' ] );
  if ( strlen( $search ) == 0 ) {
    echo '<script>
 alert("Search field is empty!");window.location.href="product-search.php";
 </script>';
  } else {
    ?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/users.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<title>Aayurveda</title>
</head>

<body>
<!-- Navigation Section Start -->
         <header>
		
<img src="../img/shapes/Final_Logo_PNG.webp" alt=" Logo" width="170px" height="50px">
		
		<ul class="navbar">
			<li><a href="index.php#header">Home</a></li>
    <li><a href="index.php#About">About</a></li>
    <li><a href="index.php#Services">Services</a></li>
    <li><a href="Product-list.php">Products</a></li>
    <li><a href="Doctors-page.php">Doctors</a></li>
    <li><a href="index.php#News">News</a></li>
    <li><a href="#Contact">Contact</a></li>
   <li><a href="chat.php">Chat</a></li>
   <li><a href="manage-cart.php">Cart</a></li>
		</ul>

		<div class="main">
			<a  href="User-Profile.php" class="user">Profile</a>
			<div id="menu-icon"><img src="../img/icons/icons8-menu-rounded-25.png" /></div>
		</div>
	</header>
 	<!--js link--->
	<script src="../js/user-Nav-bar.js"></script>
<!-- Navigation Section End --> 

<br>
<br>
<br>
<br>

<h1 class="product-title">Products</h1>
<form method="post" action="product-search.php">
  <div class="product-search-container">
    <div class="search_wrap search_wrap_6">
      <div class="search_box">
        <input type="text" class="input" name="search" id="find" placeholder="search here...." onkeyup="search()" required>
        <button class="btn">Search</button>
      </div>
    </div>
  </div>
</form>
<div class="product-container-body">
  <div class="product-container">
    <?php


    $sql2 = "SELECT * FROM product WHERE price LIKE '%$search%' OR info LIKE '%$search%'OR diseaseType LIKE '%$search%'";
    $res2 = mysqli_query( $connect, $sql2 );
    $count2 = mysqli_num_rows( $res2 );


    if ( $count2 > 0 ) {
      while ( $row2 = mysqli_fetch_assoc( $res2 ) ) {
        $id = $row2[ 'id' ];
        $Name = $row2[ 'name' ];
        $image = $row2[ 'image' ];
        $price = $row2[ 'price' ];
        $info = $row2[ 'info' ];
        $DType = $row2[ 'diseaseType' ];
        ?>
    <form method="post" action="manage-cart.php?action=add&id=<?php echo $id;?>">
      <div class="product-card">
        <div class="card-image"> <img src="../img/products/<?php echo $image;?>" alt="..."> </div>
        <div class="card-content">
          <h3><?php echo $Name;?></h3>
          <p><?php echo $DType;?></p>
          <p class="card-price">Rs.<?php echo $price;?>/=</p>
          <input type="hidden" name="hidden_name" value="<?php echo $Name; ?>">
          <input type="hidden" name="hidden_Dtype" value="<?php echo $DType; ?>">
          <input type="hidden" name="hidden_img" value="<?php echo $image; ?>">
          <input type="hidden" name="hidden_price" value="<?php echo $price;?>">
          <input type="hidden" name="quantity" value="1">
          <button type="submit" name="Add_To_Cart" value="Add_To_Cart" class="add-to-cart"> Add To Cart </button>
        </div>
      </div>
    </form>
    <?php
    }
    }else{
      echo '<script>alert("Product not found!");window.location.href="product-list.php";</script>';
    }
    ?>
  </div>
</div>

 <footer id="Contact">
      <div class="main-Footer_content">
        <div class="left box">
          <h2>About us</h2>
          <div class="Footer_content">
            <p>Aayurveda is a traditional Hindu system of medicine (incorporated in Atharva Veda, the last of the four Vedas), which is based on the idea of balance in bodily systems and uses diet, herbal treatment, and yogic breathing.</p>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="Footer_content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Colombo 7, Sri Lanka</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">01124562145</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">Aayurveda@email.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="Footer_content">
            <form action="feedback.php" method="post">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" name="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" name="msg" required></textarea>
              </div>
              <div class="footer_btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By <a href="#">Aayurveda.lk</a> | </span>
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
      </div>
    </footer>
</body>
</html>
<?php
}

} else {
  echo '<script>window.location.href="product-search.php";</script>';
}

 
}

