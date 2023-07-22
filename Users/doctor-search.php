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
 alert("Search field is empty!");window.location.href="Doctors-page.php";
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
<header> <img src="../img/shapes/Final_Logo_PNG.webp" alt=" Logo" width="170px" height="50px">
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
<div class="doctors-page-wrapper">
  <h1>Our Doctors</h1>
  <form method="post" action="doctor-search.php">
    <div class="product-search-container">
      <div class="search_wrap search_wrap_6">
        <div class="search_box">
          <input type="text" class="input" name="search" id="find" placeholder="search here...." onkeyup="search()" required>
          <button class="btn">Search</button>
        </div>
      </div>
    </div>
  </form>
  <div class="our_doctors">
    <?php
    include '../connect.php';
    $sql = "SELECT * FROM doctor WHERE First_Name LIKE '%$search%' OR Middle_Initials LIKE '%$search%'OR Last_Name LIKE '%$search%' OR Specialty_Type LIKE '%$search%' OR Bio LIKE '%$search%'";
    $res = mysqli_query( $connect, $sql );
    $count = mysqli_num_rows( $res );

    if ( $count > 0 ) {
      while ( $row = mysqli_fetch_assoc( $res ) ) {
        $doctor_id = $row[ 'Resgistration_Number' ];
        $First_Name = $row[ 'First_Name' ];
        $Middle_Initials = $row[ 'Middle_Initials' ];
        $Last_Name = $row[ 'Last_Name' ];
        $bio = $row[ 'Bio' ];
        $Specialty_Type = $row[ 'Specialty_Type' ];
        $image_name = $row[ 'Image' ];
        ?>
    <div class="team_member" >
      <div class="member_img">            <?php 
           if($row['status']=="Active now"){echo '<div class="dot1"></div>';}
           else{echo '<div class="dot2"></div>';}
           ?><img src="../img/Doctors/<?php echo $image_name; ?>" alt="our_doctors" onClick="parent.location='Live-chat/chat.php?id=<?php echo $doctor_id; ?>'"> </div>
      <h3>Dr. <?php echo $First_Name. " ".$Middle_Initials; ?></h3>
      <span><?php echo $Specialty_Type; ?></span>
      <p><?php echo $bio; ?></p>
    </div>
    <?php
    }
    } else {
      echo '<script>
                      alert("Doctor not found!");window.location.href="Doctors-page.php";
 </script>';
    }
    ?>
  </div>
</div>
<p id="no-result" class="notfound" style="display: none;">No Doctor Found</p>

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
  echo '<script>window.location.href="Doctors-page.php";</script>';
}
}
?>
