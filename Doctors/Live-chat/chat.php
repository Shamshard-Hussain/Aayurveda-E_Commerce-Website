<?php 
  session_start();
  
  if(!isset($_SESSION['D_userid'])){
    header("location: ../chat.php");
  }else{
   include_once "../../connect.php";
   
  if(isset($_GET['id'])){
 $chat_id=$_GET['id'];
 $_SESSION['incoming_chatid']=$chat_id;
 ?>
 <html>
<head>
<link rel="stylesheet" href="../../css/users.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<title>Aayurveda</title>
</head>

<body>
<!-- Navigation Section Start -->
<header> <img src="../../img/shapes/Final_Logo_PNG.webp" alt=" Logo" width="170px" height="50px">
		<ul class="navbar">
			<li><a href="../index.php#header">Home</a></li>
    <li><a href="../index.php#About">About</a></li>
    <li><a href="../index.php#Services">Services</a></li>
    <li><a href="../Product-list.php">Products</a></li>
    <li><a href="../Doctors-page.php">Doctors</a></li>
    <li><a href="../index.php#News">News</a></li>
    <li><a href="#Contact">Contact</a></li>
   <li><a href="../chat.php">Chat</a></li>
   <li><a href="../manage-cart.php">Cart</a></li>
		</ul>

		<div class="main">
			<a href="../User-Profile.php" class="user">Profile</a>
			<div id="menu-icon"><img src="../../img/icons/icons8-menu-rounded-25.png" /></div>
		</div>
	</header>
 	<!--js link--->
	<script src="../../js/user-Nav-bar.js"></script>
<!-- Navigation Section End --> 
 <br>
<br>
<br><br>
<br>
<br>
 
         <?php 
         // $chat_id = mysqli_real_escape_string($connect, $_GET['chat_id']);
          $sql = mysqli_query($connect, "SELECT * FROM doctor WHERE Resgistration_Number = {$chat_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
           ?>
         <div class="container text-center mb-5 mt-5">
  <div class="row justify-content-center">
             <div class="col-md-8">
      <div class="order-chat-section">
                 <div class="order-chat-header" id="info">
          <div class="order-store-detail">
                     <div class="order-store-img bg-dark-shop"> <img onclick="openPopup(this)" src="../../img/Doctors/<?php echo $row['Image']; ?>" alt=""> </div>
                     <div class="order-store-text-head" id="order-store-text-head">
              <h3>Dr. <?php echo $row['First_Name']. " " .$row['Middle_Initials']. " " . $row['Last_Name'] ?></h3>
              <?php
              if ( $row[ 'status' ] == "Active now" ) {
                echo "<p>" . $row[ 'status' ] . "</p>";
              } else {
                echo '<p style="color: red">' . $row[ 'status' ] . '</p>';
              }
              ?>
            </div>
                   </div>
        </div>
                 <div class="order-chat-content chat-scrollbar">
          <div class="chat-box"> </div>
          <div id="popup" onclick="closePopup()"> <img id="popup-image" src=""> </div>
        </div>
                 <div class="order-chat-footer">
          <div class="order-chat-enter-area">
                     <form class="typing-area" action="#">
              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $chat_id; ?>" hidden>
              <input type="text" name="message" class="form-control" placeholder="Type a message here..." autocomplete="off">
              <div class="chat-actions-button"> <a href="javascript:void(0);" class="chat-attach-link"> <img src="../../img/icons/icons8-add-image-48.png" alt="">
                <input type="file" id="image" name="image" accept="image/*" class="chat-file-link-set">
                </a>
                         <button class="chat-msg-send-btn"><img src="../../img/icons/icons8-send-48.png" alt=""></button>
                       </div>
            </form>
                   </div>
        </div>
               </div>
    </div>
           </div>
</div>
 
 <script>
setInterval(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("order-store-text-head").innerHTML = this.responseText;
      }
    };
    var chat_id = <?php echo $chat_id; ?>;
    xhttp.open("GET", "status.php?chat_id=" + chat_id, true);
    xhttp.send();
  }, 1000); // 1000 milliseconds = 1 second
</script>
           <?php
           
          }else {
           
           $sql2 = mysqli_query($connect, "SELECT * FROM customers WHERE Customer_ID = {$chat_id}");
          if(mysqli_num_rows($sql2) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
           
           ?>
 
           <div class="container text-center mb-5 mt-5">
  <div class="row justify-content-center">
             <div class="col-md-8">
      <div class="order-chat-section">
                 <div class="order-chat-header" id="info">
          <div class="order-store-detail">
                     <div class="order-store-img bg-dark-shop"> <img onclick="openPopup(this)" src="../../img/profile-pic/<?php echo $row2['img']; ?>" alt=""> </div>
                     <div class="order-store-text-head" id="order-store-text-head">
              <h3><?php echo $row2['First_Name']. " " . $row2['Last_Name'] ?></h3>
              <?php
              if ( $row2[ 'status' ] == "Active now" ) {
                echo "<p>" . $row2[ 'status' ] . "</p>";
              } else {
                echo '<p style="color: red">' . $row2[ 'status' ] . '</p>';
              }
              ?>
            </div>
                   </div>
        </div>
                 <div class="order-chat-content chat-scrollbar">
          <div class="chat-box"> </div>
          <div id="popup" onclick="closePopup()"> <img id="popup-image" src=""> </div>
        </div>
                 <div class="order-chat-footer">
          <div class="order-chat-enter-area">
                     <form class="typing-area" action="#">
              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $chat_id; ?>" hidden>
              <input type="text" name="message" class="form-control" placeholder="Type a message here..." autocomplete="off">
              <div class="chat-actions-button"> <a href="javascript:void(0);" class="chat-attach-link"> <img src="../../img/icons/icons8-add-image-48.png" alt="">
                <input type="file" id="image" name="image" accept="image/*" class="chat-file-link-set">
                </a>
                         <button class="chat-msg-send-btn"><img src="../../img/icons/icons8-send-48.png" alt=""></button>
                       </div>
            </form>
                   </div>
        </div>
               </div>
    </div>
           </div>
</div>
  <script>
setInterval(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("order-store-text-head").innerHTML = this.responseText;
      }
    };
    var chat_id = <?php echo $chat_id; ?>;
    xhttp.open("GET", "status2.php?chat_id=" + chat_id, true);
    xhttp.send();
  }, 1000); // 1000 milliseconds = 1 second
</script>
            <?php
           
          }else {header("location: ../chat.php");}
  }
        ?>
         

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
            <form action="../feedback.php" method="post">
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
<script src="../../js/chat.js"></script>
<script src="../../js/pop-upimage.js"></script>
<script src="../../js/send-img.js"></script>



 <?php
 
}//else{header("location: ../chat.php");}
  }
?>

