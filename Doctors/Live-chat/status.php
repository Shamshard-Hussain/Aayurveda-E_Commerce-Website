<?php 
include_once "../../connect.php";
  $user_id = mysqli_real_escape_string($connect, $_GET['chat_id']);
  $sql = mysqli_query($connect, "SELECT * FROM doctor WHERE Resgistration_Number = {$user_id}");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>

<div id="order-store-text-head">
  <h3>Dr. <?php echo $row['First_Name']. " " .$row['Middle_Initials']. " " . $row['Last_Name'] ?></h3>
  <?php
    if($row['status'] == "Active now") {
      echo '<p>Online</p>';
    } else {
        echo '<p style="color: red">Offline now</p>';
    }
  ?>
</div>
