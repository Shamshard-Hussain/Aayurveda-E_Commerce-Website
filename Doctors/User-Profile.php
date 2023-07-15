<?php
   include '../connect.php';
session_start();
$Doc_id= $_SESSION[ 'D_userid' ];
if ($_SESSION['Doctor_log'] == '')
{
    header("location:../Login.html");
}else{
 ?>
<html>
<head>
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
			<a href="User-Profile.php" class="user">Profile</a>
			<div id="menu-icon"><img src="../img/icons/icons8-menu-rounded-25.png" /></div>
		</div>
	</header>
 	<!--js link--->
	<script src="../js/user-Nav-bar.js"></script>
<!-- Navigation Section End --> 
 <br>
<br>
<br><br>
<br>
<br>
 <?php 
                            
                             $sql ="SELECT * FROM doctor WHERE Resgistration_Number=$Doc_id ";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
                           if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                            $First_Name= $row['First_Name'];
                            $Middle_Initials= $row['Middle_Initials'];
                            $Last_Name= $row['Last_Name'];
                            $Email=$row['Email'];
                            $Nic_Number=$row['Nic_Number'];
                            $Gender=$row['Gender'];
                            $Specialty_Type=$row['Specialty_Type'];
                            $Bio=$row['Bio'];
                            $Phone=$row['phone'];
                             $Home_Number=$row['Home_Number'];
                             $Street_Name=$row['Street_Name'];
                             $City_Name=$row['City_Name'];
                            $image_name= $row['Image'];
                            }
                           }
                         ?>
 
 
 	<div class="logout-div">
		<button class="logout-btn" onclick="if (confirm('Log Out?')){window.location.href = 'logout.php';}
                else{event.stopPropagation(); event.preventDefault();};">Logout</button>
	</div>
	<div class="doc_profile_container">
  
 <form id="image-form" method="post" enctype="multipart/form-data" action="update-profile-pic.php">
		<div class="doc_profile-image" style="background-image: url('../img/Doctors/<?php echo $image_name; ?>');">
  <input type="hidden" id="image-name" name="image_name" value="<?php echo $image_name; ?>">
  <!--<input type="file" id="image-input" name="image" accept="image/*" class="chat-file-link-set" style="display: none;">
  <button type="button" id="change-button">Change</button>-->
   	</div>
</form>
  
  <br>
		<div class="doc_profile-details">
			<h1><?php echo $First_Name." ".$Middle_Initials." ".$Last_Name; ?></h1>
			<p><span>NIC Number:</span> <?php echo $Nic_Number; ?></p>
			<p><span>Phone:</span><?php echo $Phone; ?></p>
			<p><span>Email:</span><?php echo $Email; ?></p>
			<p><span>Gender:</span><?php echo $Gender; ?></p>
			<p><span>Specialty Type:</span><?php echo $Specialty_Type; ?></p>
			<p><span>Bio:</span><?php echo $Bio; ?></p>
			<p><span>Address:</span><?php echo $Home_Number.", ".$Street_Name.", ".$City_Name; ?></p>
		</div>
	</div>
 
 <script>
  const form = document.querySelector('#image-form');
const imageInput = document.querySelector('#image-input');
const changeButton = document.querySelector('#change-button');

changeButton.addEventListener('click', () => {
  imageInput.click();
});

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const formData = new FormData();
  formData.append('image_name', document.querySelector('#image-name').value);
  formData.append('image', imageInput.files[0]);

  fetch('update-profile-pic.php', {
    method: 'POST',
    body: formData
  }).then(response => {
    // Handle the response from update.php
  }).catch(error => {
    alert('Failed to update profile img');
  });
});
</script>
 
 <br>
<br>
<br>
 
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
