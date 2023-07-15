<?php
   include '../connect.php';
session_start();
if ($_SESSION['D_userid'] == '')
{
    header("location:../Login.html");
}else{
 $user_id= $_SESSION['D_userid']; 
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
 
 <div class="chat_container">
            <h1>Chat List</h1>
            <div id="searchWrapper">
                <input
                    type="text"
                    name="searchBar"
                    id="searchBar"
                    placeholder="search for a Doctors or Community Users"
                />
            </div>
            
        </div>
     
     <div class="our_doctors">
         <?php
         $Doctor_sql = "SELECT * FROM doctor WHERE Resgistration_Number !=$user_id ";
         $Doctor_res = mysqli_query( $connect, $Doctor_sql );
         $Doctor_count = mysqli_num_rows( $Doctor_res );

         if ( $Doctor_count > 0 ) {
         while ( $Doctor_row = mysqli_fetch_assoc( $Doctor_res ) ) {
          ?>
         <div class="team_member" >
         <div class="member_img" onClick="parent.location='Live-chat/chat.php?id=<?php echo $Doctor_row['Resgistration_Number']; ?>'"> 
                   <?php
         if ( $Doctor_row[ 'status' ] == "Active now" ) {
           echo '<div class="dot1"></div>';
         } else {
           echo '<div class="dot2"></div>';
         }
         ?>
          
          <img src="../img/Doctors/<?php echo $Doctor_row['Image']; ?>" alt="our_doctors"> </div>
         <h3>Dr. <?php echo $Doctor_row['First_Name']. " ".$Doctor_row['Middle_Initials']. " ".$Doctor_row['Last_Name'] ?></h3>
         <span><?php echo $Doctor_row['Specialty_Type']; ?></span>
         <p><?php echo $Doctor_row['Email']; ?></p>

       </div>
       <?php
         }
         }

// retrieve outgoing_msg_id values from messages table
$sql = "SELECT DISTINCT outgoing_msg_id FROM messages WHERE incoming_msg_id = $user_id";
$result = mysqli_query($connect, $sql);

// loop through each outgoing_msg_id and retrieve corresponding customer data
while ($row = mysqli_fetch_assoc($result)) {
  $outgoing_msg_id = $row['outgoing_msg_id'];
  
 echo $outgoing_msg_id;
  // retrieve customer data for this outgoing_msg_id from customers table
  $sql2 = "SELECT * FROM customers WHERE Customer_ID = $outgoing_msg_id";
  $result2 = mysqli_query($connect, $sql2);
  
  // display customer data for this outgoing_msg_id
  while ($row2 = mysqli_fetch_assoc($result2)) {
    // display customer data here
             ?>
         <div class="team_member" >
         <div class="member_img" onClick="parent.location='Live-chat/chat.php?id=<?php echo $row2['Customer_ID']; ?>'"> 
                   <?php
         if ( $row2[ 'status' ] == "Active now" ) {
           echo '<div class="dot1"></div>';
         } else {
           echo '<div class="dot2"></div>';
         }
         ?>
          <img src="../img/profile-pic/<?php echo $row2['img']; ?>" alt="our_doctors"> </div>
         <h3><?php echo $row2['First_Name']." ".$row2['Last_Name'] ?></h3>
         <span>Community User</span>
         <p><?php echo $row2['Email']; ?></p>

         </div>
         <?php
          }
          }
         ?>
      
      
      
      
      
      
     
    </div>
</div>
<p id="no-result" class="notfound" style="display: none;">No Doctor Found</p>
     <script>  document.getElementById('searchBar').addEventListener('input', function() {
    search();
  });
 function search() {
  let filter = document.getElementById('searchBar').value.toUpperCase();
  let teamMembers = document.querySelectorAll('.team_member');
  let noResult = document.querySelector('#no-result');

  let matchFound = false;

  teamMembers.forEach(teamMember => {
    let h3 = teamMember.querySelector('h3');
    let span = teamMember.querySelector('span');
    let p = teamMember.querySelector('p');
    let h3Value = h3.innerHTML || h3.innerText || h3.textContent;
    let spanValue = span.innerHTML || span.innerText || span.textContent;
    let pValue = p.innerHTML || p.innerText || p.textContent;
    let isMatch = (h3Value.toUpperCase().indexOf(filter) > -1) || 
                  (spanValue.toUpperCase().indexOf(filter) > -1) || 
                  (pValue.toUpperCase().indexOf(filter) > -1);
    if (isMatch) {
      teamMember.style.display = "";
      matchFound = true;
    } else {
      teamMember.style.display = "none";
    }
  });

  if (!matchFound) {
    noResult.style.display = "";
  } else {
    noResult.style.display = "none";
  }
}</script>
 
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
