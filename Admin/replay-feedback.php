
<?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}
if(isset($_GET['Email']))
{
 include '../connect.php';
   $Email=$_GET['Email'];
}else{
  echo '<script>window.location.href="admin-feedback-view.php";</script>';
  }
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
        <li> <a href="Admin-Home-Page.php" > <span ><img src="../img/icons/icons8-home-30.png"/></span> <small>Home</small> </a> </li>
        <li> <a href="Admin-Doctors-list-Page.php" > <span><img src="../img/icons/icons8-doctors-30 (1).png"/></span> <small>Doctors</small> </a> </li>
        <li> <a href="Admin-View-user-list-Page.php"> <span><img src="../img/icons/icons8-people-30 (1).png"/></span> <small>Customers</small> </a> </li>
        <li> <a href="Admin-View-product-list-Page.php"> <span><img src="../img/icons/icons8-packing-30.png"/></span> <small>Products</small> </a> </li>
        <li> <a href="Orders.php"> <span ><img src="../img/icons/icons8-shopping-cart-30.png"/></span> <small>Orders</small> </a> </li>
        <li> <a href="admin-feedback-view.php" class="active"> <span><img src="../img/icons/icons8-documents-30 (1).png"/></span> <small>F&Q</small> </a> </li>
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
        <!-- <div class="notify-icon"> <span><img src="../img/icons/icons8-doorbell-20.png"/></span> <span class="notify">3</span> </div>-->
        <div class="user" title="Logout" onclick="if (confirm('Log Out?')){window.location.href = 'Admin-logout.php';}
                else{event.stopPropagation(); event.preventDefault();};"> 
          <!--  <div class="bg-img" style="background-image: url(../img/Doctors/profile-user.png)"></div>--> 
          
          <span><img src="../img/icons/icons8-logout-rounded-up-20.png"/></span> <span>Logout</span> </div>
      </div>
    </div>
  </header>
  <main>
    <div class="page-header">
      <h1>Feedback</h1>
      <small> Send Mail</small> </div>
    <div class="page-content">
     
      <form class="send-mail" method="post" action="#">
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your email.." readonly value="<?php echo $Email?>" >
      
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Subject.." required>
      
      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea>
      
     <button type="submit" name="submit">Reply</button>
    </form>
     <?php
     if(isset($_POST['submit'])){
      $sb =mysqli_real_escape_string($connect, $_POST[ 'subject' ]);
      $email =mysqli_real_escape_string($connect, $_POST[ 'email' ]);
      $msg =mysqli_real_escape_string($connect, $_POST[ 'message' ]);
      
      // Set the recipient email address
//$to = "recipient@example.com";

// Set the subject of the email
//$subject = "Test Email";

// Set the message body
//$message = "This is a test email sent from PHP.";

// Set the sender email address
$from = " ";

// Set additional headers
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "Content-Type: text/html\r\n";

// Send the email using the mail() function
if(mail($email, $sb, $msg, $headers)) {

 echo '<script>
         alert("Email sent successfully");window.location.href="admin-feedback-view.php";
         </script>';
} else {
   echo '<script>
         alert("Failed to send Email");window.location.href="admin-feedback-view.php";
         </script>';
 die();
}
      
     }
     ?>
     
    </div>
  </main>
</div>
</body>
</html>