<!doctype html>
<html>
 <?php
session_start();
if ($_SESSION['Doctor_log'] == '')
{
    header("location:../Login.html");
}else{
 include_once "../connect.php";
 
 
         $logout_id = $_SESSION[ 'D_userid' ];

            $status = "Offline now";
            $sql = mysqli_query($connect, "UPDATE doctor SET status = '{$status}' WHERE Resgistration_Number=$logout_id");
            if($sql){
              unset($_SESSION[ 'D_email' ]);
              unset($_SESSION[ 'D_name' ]);
              unset($_SESSION[ 'D_lname' ]);
              unset($_SESSION[ 'D_userid' ]);
              unset($_SESSION[ 'cart' ]);
              unset($_SESSION[ 'Doctor_log' ]);
              unset($_SESSION['incoming_chatid']);
                session_unset();
                session_destroy();
                header("location:../Login.html");
            }
        else{
            header("location: User-Profile.php");
        }
}
?>
 
 
