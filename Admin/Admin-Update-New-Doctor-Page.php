<?php
session_start();
if ( $_SESSION[ 'Admin_log' ] == '' ) {
  header( "location:../Login.html" );
}


include '../connect.php';


if ( isset( $_GET[ 'id' ] ) & isset( $_GET[ 'image_name' ] ) ) {
  $id = $_GET[ 'id' ];
  $image_name = $_GET[ 'image_name' ];
} else {
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
        <li> <a href="Admin-Home-Page.php" > <span ><img src="../img/icons/icons8-home-30.png"/></span> <small>Home</small> </a> </li>
        <li> <a href="Admin-Doctors-list-Page.php" class="active"> <span><img src="../img/icons/icons8-doctors-30.png"/></span> <small>Doctors</small> </a> </li>
        <li> <a href="Admin-View-user-list-Page.php"> <span><img src="../img/icons/icons8-people-30 (1).png"/></span> <small>Customers</small> </a> </li>
        <li> <a href="Admin-Doctors-list-Page.php"> <span><img src="../img/icons/icons8-packing-30.png"/></span> <small>Products</small> </a> </li>
        <li> <a href="Oders.php"> <span ><img src="../img/icons/icons8-shopping-cart-30.png"/></span> <small>Orders</small> </a> </li>
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
      <small>Update</small> </div>
    <div class="page-content">
      <div class="doctors-form-container"> 
        <!--<h3>Doctors Registration</h3> -->
        
        <?php

        $sql = "SELECT * FROM doctor WHERE doctor_id=$id ";
        $res = mysqli_query( $connect, $sql );
        $count = mysqli_num_rows( $res );

        if ( $count > 0 ) {
          while ( $row = mysqli_fetch_assoc( $res ) ) {
            $Resgistration_Number = $row[ 'Resgistration_Number' ];
            $First_Name = $row[ 'First_Name' ];
            $Middle_Initials = $row[ 'Middle_Initials' ];
            $Last_Name = $row[ 'Last_Name' ];
            $Email = $row[ 'Email' ];
            $Nic_Number = $row[ 'Nic_Number' ];
            $Gender = $row[ 'Gender' ];
            $Specialty_Type = $row[ 'Specialty_Type' ];
            $Bio = $row[ 'Bio' ];
            $Phone = $row[ 'phone' ];
            $Home_Number = $row[ 'Home_Number' ];
            $Street_Name = $row[ 'Street_Name' ];
            $City_Name = $row[ 'City_Name' ];
            $image_name = $row[ 'Image' ];
          }
        }
        ?>
        <form class="doctors-form" action="#" method="post" enctype="multipart/form-data" id="myForm">
          <div class="form first"> <img class="doc-image" id="preview" src="../img/doctors/<?php echo $image_name; ?>"/><br>
            <input type="hidden" value="<?php echo $image_name; ?>" name="current_image">
            <div class="details personal"> <span class="title"></span>
              <div class="fields">
                <div class="input-field">
                  <label>Resgistration Number</label>
                  <input type="text" placeholder="Enter Resgistration Number" value="<?php echo $Resgistration_Number; ?>" name="regnumber" required pattern="\d{4,}" title="Enter only numbers with at least 4 digits">
                </div>
                <div class="input-field">
                  <label>First Name</label>
                  <input type="text" placeholder="Enter First Name" required name="fname" pattern="[A-Za-z]+" title="Only letters are allowed." value="<?php echo $First_Name; ?>">
                </div>
                <div class="input-field">
                  <label>Middle Initials</label>
                  <input type="text" placeholder="Enter Middle Initials" required name="mname" pattern="[A-Za-z]+" title="Only letters are allowed." value="<?php echo $Middle_Initials; ?>">
                </div>
                <div class="input-field">
                  <label>Last Name</label>
                  <input type="text" placeholder="Enter Last Name" required name="lname" pattern="[A-Za-z]+" title="Only letters are allowed." value="<?php echo $Last_Name; ?>">
                </div>
                <div class="input-field">
                  <label>Nic Number</label>
                  <input type="text" placeholder="Enter Nic Number" required name="nic" value="<?php echo $Nic_Number; ?>">
                </div>
                <div class="input-field">
                  <label>Gender</label>
                  <select required name="gender">
                    <option value="<?php echo $Gender; ?>"><?php echo $Gender; ?></option>
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
                    <option value="<?php echo $Specialty_Type; ?>"><?php echo $Specialty_Type; ?></option>
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
                  <input type="text" placeholder="Enter Doctor Bio" required name="bio" value="<?php echo $Bio; ?>">
                </div>
                <div class="input-field" >
                  <label>Upload Image</label>
                  <input type="file" name="image" id="fileID" onchange="previewImage()" >
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
                  <input type="text" placeholder="Home Number" required name="homeNo" pattern="[0-9]+(/[A-Za-z0-9]+)?"  title="Please enter valid Home Number" value="<?php echo $Home_Number; ?>">
                </div>
                <div class="input-field">
                  <label>Street Name</label>
                  <input type="text" placeholder="Enter Street Name" required name="Sname" pattern="[A-Za-z\s,]+" title="Only letters, spaces, and commas are allowed." value="<?php echo $Street_Name; ?>">
                </div>
                <div class="input-field">
                  <label>City Name</label>
                  <input type="text" placeholder="Enter City Name" required name="cName" pattern="^[A-Za-z]+(?:[- ][A-Za-z]+)*$" value="<?php echo $City_Name; ?>">
                </div>
                <div class="input-field">
                  <label>Email</label>
                  <input type="email" placeholder="Enter email" required name="email" value="<?php echo $Email; ?>">
                </div>
                <div class="input-field">
                  <label>Phone</label>
                  <input type="text" placeholder="Enter phone number" required name="phone" maxlength="9" pattern="[+ 0-9]{9}" title="Please Enter 9 digit number without 0" value="<?php echo $Phone; ?>">
                </div>
              </div>
              <button class="backBtn" type="submit" name="submit"> <span class="btnText">Update</span> </button>
            </div>
          </div>
        </form>
        <?php
        if ( isset( $_POST[ 'submit' ] ) ) {

          $mail = mysqli_real_escape_string( $connect, $_POST[ 'email' ] );
          $fname = mysqli_real_escape_string( $connect, $_POST[ 'fname' ] );
          $mname = mysqli_real_escape_string( $connect, $_POST[ 'mname' ] );
          $lname = mysqli_real_escape_string( $connect, $_POST[ 'lname' ] );
          $nic = mysqli_real_escape_string( $connect, $_POST[ 'nic' ] );
          $regnumber = mysqli_real_escape_string( $connect, $_POST[ 'regnumber' ] );
          $Phone = mysqli_real_escape_string( $connect, $_POST[ 'phone' ] );
          $Gender = mysqli_real_escape_string( $connect, $_POST[ 'gender' ] );
          $SpecialtySelect = mysqli_real_escape_string( $connect, $_POST[ 'specialtySelect' ] );
          $bio = mysqli_real_escape_string( $connect, $_POST[ 'bio' ] );
          $Home_no = mysqli_real_escape_string( $connect, $_POST[ 'homeNo' ] );
          $SreetName = mysqli_real_escape_string( $connect, $_POST[ 'Sname' ] );
          $City = mysqli_real_escape_string( $connect, $_POST[ 'cName' ] );

          $current_image = mysqli_real_escape_string( $connect, $_POST[ 'current_image' ] );


          if ( strlen( $fname ) == 0 || strlen( $lname ) == 0 || strlen( $mname ) == 0 || strlen( $Phone ) == 0 ||
            strlen( $nic ) == 0 || strlen( $Gender ) == 0 || strlen( $Home_no ) == 0 ||
            strlen( $SreetName ) == 0 || strlen( $City ) == 0 || strlen( $mail ) == 0 ||
            strlen( $regnumber ) == 0 || strlen( $SpecialtySelect ) == 0 ) {
            echo '<script>
 alert("Fields are empty!");window.location.href="Admin-Doctors-list-Page.php";
 </script>';
          } else if ( !preg_match( "/^[A-Za-z]+$/", $fname ) ) {
            ?>
        <script>alert("Please enter valid first name!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        } else if ( !preg_match( "/^[A-Za-z]+$/", $lname ) ) {
          ?>
        <script>alert("Please enter valid middle name!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        } else if ( !preg_match( "/^[A-Za-z]+$/", $mname ) ) {
          ?>
        <script>alert("Please enter valid last name!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        } else if ( !preg_match( '/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/', $nic ) ) {
          ?>
        <script>alert("Please Enter valid nic number!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        } else if ( !preg_match( "/^[0-9]*$/", $Phone ) ) {
          ?>
        <script>alert("Please enter valid phone number!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        } else if ( !preg_match( "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $mail ) ) {
          ?>
        <script>alert("Please enter valid email!");window.location.href='Admin-Doctors-list-Page.php';</script>
        <?php
        }


        if ( $Email != $mail ) {
          $select = mysqli_query( $connect, "SELECT * FROM doctor WHERE Email='$mail'" );
          if ( mysqli_num_rows( $select ) > 0 ) {
            echo '<script>
        alert("Doctor nic number already registered!");window.location.href="Admin-Doctors-list-Page.php";
        </script>';
            die(); // Stop script execution

          }
        }
        if ( $Email != $mail ) {
          $select4 = mysqli_query( $connect, "SELECT * FROM customers WHERE Email='$mail' " );
          if ( mysqli_num_rows( $select4 ) > 0 ) {
            echo '<script>
        alert("Doctor nic number already registered!");window.location.href="Admin-Doctors-list-Page.php";
        </script>';
            die(); // Stop script execution

          }
        }
        if ( $Nic_Number != $nic ) {
          // Check if NIC number matches
          $select2 = mysqli_query( $connect, "SELECT * FROM doctor WHERE Nic_Number='$nic'" );
          if ( mysqli_num_rows( $select2 ) > 0 ) {
            echo '<script>
        alert("Doctor nic number already registered!");window.location.href="Admin-Doctors-list-Page.php";
        </script>';
            die(); // Stop script execution
          }
        }
        if ( $Resgistration_Number != $regnumber ) {
          // Check if registration number matches
          $select3 = mysqli_query( $connect, "SELECT * FROM doctor WHERE Resgistration_Number=$regnumber" );
          if ( mysqli_num_rows( $select3 ) > 0 ) {
            echo '<script>
        alert("Doctor already registered!");window.location.href="Admin-Doctors-list-Page.php";
        </script>';
            die(); // Stop script execution
          }
        } else {
          if ( isset( $_FILES[ 'image' ][ 'name' ] ) ) {
            $image_name = $_FILES[ 'image' ][ 'name' ];

            if ( $image_name != "" ) {
              // Generate a unique filename using rand and current timestamp
              $ext = pathinfo( $image_name, PATHINFO_EXTENSION );
              $image_name = $name . rand( 0000, 9999 ) . '_' . time() . '.' . $ext;

              // Get source and destination paths
              $src_path = $_FILES[ 'image' ][ 'tmp_name' ];
              $dest_path = "../img/Doctors/" . $image_name;

              // Upload new image
              $upload = move_uploaded_file( $src_path, $dest_path );

              if ( $upload == false ) {
                echo '<script>
                  alert("Failed to upload new image!");window.location.href="Admin-Doctors-list-Page.php";
                  </script>';
                // die();
              }

              if ( $current_image != "" ) {
                // Remove old image
                $remove_path = "../img/Doctors/" . $current_image;
                $remove = unlink( $remove_path );

                if ( $remove == false ) {
                  // Failed to remove old image
                  echo '<script>
                  alert("Failed to remove current image!");window.location.href="Admin-Doctors-list-Page.php";
                  </script>';
                  die();
                }
              }
            } else {
              $image_name = $current_image;
            }
          }

          $sql = "Update doctor set
                       Resgistration_Number=$regnumber,
                       First_Name ='$fname',
                       Middle_Initials='$mname',
                       Last_Name='$lname',
                       Nic_Number='$nic',
                       phone=$Phone,
                       Email='$mail',
                       Gender='$Gender',
                       Specialty_Type='$SpecialtySelect',
                       Bio='$bio',
                       Image ='$image_name',
                       Home_Number='$Home_no',
                       Street_Name='$SreetName',
                       City_Name='$City'
                      WHERE doctor_id=$id";

          $res = mysqli_query( $connect, $sql );

          if ( $res ) {
            echo '<script>
                  alert("Successfully Updated");window.location.href="Admin-Doctors-list-Page.php";
                  </script>';

          } else {
            echo '<script>
                  alert("Failed to Update!");window.location.href="Admin-Doctors-list-Page.php";
                  </script>';

          }
        }

        }

        ?>
      </div>
    </div>
  </main>
</div>
</body>
</html>
