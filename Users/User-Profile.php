<?php
   include '../connect.php';
session_start();
$user_id= $_SESSION['userid']; 
if ($_SESSION['log'] == '')
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
 
 <div class="profile-container">
		<div class="profile-header">
			<div class="profile-logo">User Profile</div>
			<button class="logout" onclick="if (confirm('Log Out?')){window.location.href = 'logout.php';}
                else{event.stopPropagation(); event.preventDefault();};">logout</button>
		</div>
		<div class="user-info">
   
<div class="user-image">
     <?php 

                             $sql ="SELECT * FROM Customers where Customer_ID=$user_id";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
                           if($count>0){
                           while($row=mysqli_fetch_assoc($res)){
                           $Customer_ID=$row['Customer_ID'];
                           $First_Name= $row['First_Name'];
                           $Last_Name= $row['Last_Name'];
                           $Email=$row['Email'];
                           $Phone=$row['Phone'];
                           $Dob=$row['Dob'];
                           $Gender=$row['Gender'];
                           $img=$row['img'];
                           $Home_No=$row['Home_No'];
                           $Street_name=$row['Street_name'];
                           $City=$row['City'];
                            $Joined_on=$row['Joined_on'];
                           }}
        
                               ?>
   
   <form action="update-profile-pic.php" method="post" enctype="multipart/form-data" id="profile-pic-form">
  <img src="../img/profile-pic/<?php echo $img ?>" width="200px" height="200px" alt="User Image">
  <br>
  <input type="file" id="image" name="image" accept="image/*" required>
    <input type="hidden"  name="current_image" value="<?php echo $img ?>" readonly>
  <p id="image-chosen"></p>
  <button class="update-image" type="submit">Update Image</button>
</form>
 <script src="../js/profile-pic.js"></script>
   </div>
   
   
			<div class="user-details">
				<h2>User Information</h2>
				<form>
					<div class="form-group">
						<label for="first-name">First Name:</label>
						<input type="text" id="first-name" name="first-name" value="<?php echo $First_Name ?>" readonly>
					</div>
					<div class="form-group">
						<label for="last-name">Last Name:</label>
						<input type="text" id="last-name" name="last-name" value="<?php echo $Last_Name ?>" readonly>
					</div>
					<div class="form-group">
						<label for="phone">Phone:</label>
						<input type="text" id="phone" name="phone" value="<?php echo $Phone ?>" readonly>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" id="email" name="email" value="<?php echo $Email ?>" readonly>
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth:</label>
						<input type="text" id="dob" name="dob" value="<?php echo $Dob ?>" readonly>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<!--<select id="gender" name="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>-->
      <input type="text" id="gender" name="gender" value="<?php echo $Gender ?>" readonly>
					</div>
					<div class="form-group">
						<label for="home-no">Home No:</label>
						<input type="text" id="home-no" name="home-no" value="<?php echo $Home_No ?>" readonly>
					</div>
					<div class="form-group">
						<label for="street-name">Street Name:</label>
						<input type="text" id="street-name" name="street-name" value="<?php echo $Street_name ?>" readonly>
					</div>
					<div class="form-group">
						<label for="city">City:</label>
						<input type="text" id="city" name="city" value="<?php echo $City ?>" readonly>
					</div>
					<div class="form-group">
						<label for="joined-date">Joined Date:</label>
						<input type="text" id="joined-date" name="joined-date" value="<?php echo $Joined_on ?>" readonly>
					</div>
				<!--<button class="change-password">Change Password</button>-->
				</form>
			</div>
		</div>
	</div>
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
