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
                <h1>Doctors</h1>
                <small>Add</small>
            </div>
            
            <div class="page-content">
            
               <div class="doctors-form-container">
        <!--<h3>Doctors Registration</h3> -->

        <form class="doctors-form" action="add-doctors-form.php" method="post" enctype="multipart/form-data" id="myForm">
            <div class="form first">
            <img class="doc-image" id="preview" src="../img/profile-pic/profile-icon.png"/><br>
                <div class="details personal">
                    <span class="title"></span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Resgistration Number</label>
                            <input type="text" placeholder="Enter Resgistration Number" name="regnumber" required pattern="\d{4,}" title="Enter only numbers with at least 4 digits">
                        </div>

                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter First Name" required name="fname" pattern="[A-Za-z]+" title="Only letters are allowed.">
                        </div>

                        <div class="input-field">
                            <label>Middle Initials</label>
                            <input type="text" placeholder="Enter Middle Initials" required name="mname" pattern="[A-Za-z]+" title="Only letters are allowed.">
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Name" required name="lname" pattern="[A-Za-z]+" title="Only letters are allowed.">
                        </div>
                     
                        <div class="input-field">
                            <label>Nic Number</label>
                            <input type="text" placeholder="Enter Nic Number" required name="nic">
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select required name="gender">
                                <option hidden value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="details ID">

                    <div class="fields">
                     <div class="input-field">
                            <label>Specialty Type</label>
                            <select required name="specialtySelect">
                                <option hidden value="">Select Specialty</option>
                                <option value="Diabeltic specialist">Diabeltic specialist</option>
                                <option value="Gastritis specialist">Gastritis specialist</option>
                                <option value="Neuronlogy specialist">Neuronlogy specialist</option>
                                <option value="Arthritis specialist">Arthritis specialist</option>
                                <option value="Rheumatology specialist">Rheumatology specialist</option>
                                <option value="Gynecologist specialist">Gynecologist specialist</option>
                                <option value="None">None</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Add Bio</label>
                            <input type="text" placeholder="Enter Doctor Bio" required name="bio">
                        </div>

                        <div class="input-field" >
                            <label>Upload Image</label>
                           <input type="file" name="image" id="fileID" onchange="previewImage()" required>
                        </div>
                     
                     <script>
function previewImage() {
  var preview = document.getElementById("preview");
  var file = document.getElementById("fileID").files[0];
  var reader = new FileReader();

  reader.onloadend = function() {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "../img/profile-pic/profile-icon.png";
  }
}
</script>
                        <div class="input-field">
                            <label>Home Number</label>
                            <input type="text" placeholder="Home Number" required name="homeNo" pattern="[0-9]+(/[A-Za-z0-9]+)?"  title="Please enter valid Home Number">
                        </div>

                        <div class="input-field">
                            <label>Street Name</label>
                            <input type="text" placeholder="Enter Street Name" required name="Sname" pattern="[A-Za-z\s,]+" title="Only letters, spaces, and commas are allowed.">
                        </div>

                        <div class="input-field">
                            <label>City Name</label>
                            <input type="text" placeholder="Enter City Name" required name="cName" pattern="^[A-Za-z]+(?:[- ][A-Za-z]+)*$">
                        </div>
                     
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter email" required name="email">
                        </div>
                     
                       <div class="input-field">
                            <label>Phone</label>
                            <input type="text" placeholder="Enter phone number" required name="phone" maxlength="9" pattern="[+ 0-9]{9}" title="Please Enter 9 digit number without 0">
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" required name="password" pattern=".{7,}" title="Seven or more characters">
                        </div>

                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="password" placeholder="Enter Confirm Password" required name="cpassword" pattern=".{7,}" title="Seven or more characters">
                        </div>
                    </div>

                    <button class="backBtn" type="submit">
                        <span class="btnText">Add</span>
                    </button>
                </div> 
            </div>

            
        </form>
    </div>
            
            </div>
            
        </main>
        
    </div>
</body>
</html>