<?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}


include '../connect.php';


if ( isset( $_GET[ 'id' ] )) {
  $id = $_GET[ 'id' ];
}else{
 header( "location:Admin-Doctors-list-Page.php" );
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
                    <li>
                       <a href="Admin-Home-Page.php" >
                            <span ><img src="../img/icons/icons8-home-30.png"/></span>
                            <small>Home</small>
                        </a>
                    </li>
                    <li>
                       <a href="Admin-Doctors-list-Page.php" class="active">
                            <span><img src="../img/icons/icons8-doctors-30.png"/></span>
                            <small>Doctors</small>
                        </a>
                    </li>
                    
                    
                     <li>
                       <a href="Admin-View-user-list-Page.php">
                            <span><img src="../img/icons/icons8-people-30 (1).png"/></span>
                            <small>Customers</small>
                        </a>
                    </li>
                    <li>
                       <a href="Admin-View-product-list-Page.php">
                            <span><img src="../img/icons/icons8-packing-30.png"/></span>
                            <small>Products</small>
                        </a>
                    </li>
                    <li>
                       <a href="Orders.php">
                            <span ><img src="../img/icons/icons8-shopping-cart-30.png"/></span>
                            <small>Orders</small>
                        </a>
                    </li>
                     <li>
                       <a href="admin-feedback-view.php">
                            <span><img src="../img/icons/icons8-documents-30.png"/></span>
                            <small>F&Q</small>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span><img src="../img/icons/icons8-menu-25.png"/></span>
                </label>
                
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
                <h1>Doctors</h1>
                <small>View</small>
            </div>
            
            <div class="page-content">
            
               <div class="cv-wrapper">
                
                     
                           <?php 
                            
                             $sql ="SELECT * FROM doctor WHERE doctor_id=$id ";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
                           if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                            $doctor_id=$row['doctor_id'];
                            $Resgistration_Number= $row['Resgistration_Number'];
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
		<div class="resume_design">
			<div class="resume_left">
				<div class="about_sec">
					<div class="cv-button">Doctor Bio</div>
					<?php 
     if (str_word_count($Bio) > 36) {
  $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $Bio);
  $first = '';
  $second = '';
  foreach($sentences as $sentence) {
    if (str_word_count($first) + str_word_count($sentence) <= 36) {
      $first .= $sentence . ' ';
    } else {
      $second .= $sentence . ' ';
    }
  }
  echo "<p>" . $first . "</p>";
  echo "<p>" . $second . "</p>";
} else {
  echo "<p>" . $Bio . "</p>";
}

     ?>
				</div>
				<div class="exp_sec">
					<div class="cv-button">Experience</div>
					<ul>
  
      <li>
							<div class="item">
								<div class="item_grp">
									<p class="title">Doctor Id</p>
									<p class="sub_title"><?php echo $doctor_id; ?></p>
									<!--<span class="timeline">2020 - Present</span>-->
								</div>
								<!--<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
							</div>
						</li>
      
						<li>
							<div class="item">
								<div class="item_grp">
									<p class="title">Resgistration Number</p>
									<p class="sub_title"><?php echo $Resgistration_Number; ?></p>
									<!--<span class="timeline">2020 - Present</span>-->
								</div>
								<!--<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
							</div>
						</li>
      
						<li>
							<div class="item">
								<div class="item_grp">
									<p class="title">Nic Number</p>
									<p class="sub_title"><?php echo $Nic_Number; ?></p>
									<!--<span class="timeline">Sub_Experience_2</span>-->
								</div>
							<!--	<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
							</div>
						</li>
      
						<li>
							<div class="item">
								<div class="item_grp">
									<p class="title">Gender</p>
									<p class="sub_title"><?php echo $Gender; ?></p>
								<!--	<span class="timeline">2015 - 2017</span>-->
								</div>
								<!--<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
							</div>
						</li>
      
					</ul>
				</div>
    
			</div>
   
			<div class="resume_right">
				<div class="profile_sec">
					<div class="img_holder">
						<img src="../img/Doctors/<?php echo $image_name; ?>" alt="profile image">
					</div>
					<div class="profile_info">
						<p class="first_name"><?php echo $First_Name; ?></p>
						<p class="last_name"><?php echo $Middle_Initials." ".$Last_Name; ?></p>
						<p class="role"><?php echo $Specialty_Type; ?></p>
					</div>
				</div>
    <br>
				<div class="contact_sec">
					<div class="cv-button">Contact </div>
					<ul>
      
						<li class="item">
							<div class="icon">
								<i><img src="../img/icons/icons8-duplicate-contacts-17.png"/></i>
							</div>
							<div class="content">
								<p class="title">Phone</p>
								<p class="subtitle"><?php echo $Phone; ?></p>
							</div>
						</li>
      
						<li class="item">
							<div class="icon">
								<i><img src="../img/icons/icons8-envelope-17.png"/></i>
							</div>
							<div class="content">
								<p class="title">Email</p>
								<p class="subtitle"><?php echo $Email; ?></p>
							</div>
						</li>
						<li class="item">
							<div class="icon">
								<i><img src="../img/icons/icons8-home-address-17.png"/></i>
							</div>
							<div class="content">
								<p class="title">Address</p>
								<p class="subtitle"><?php echo $Home_Number.", ".$Street_Name.", ".$City_Name; ?></p>
							</div>
						</li>
					</ul>
				</div>
    
				
			</div>
		</div>

	</div>
            
            </div>
            
        </main>
        
    </div>
</body>
</html>