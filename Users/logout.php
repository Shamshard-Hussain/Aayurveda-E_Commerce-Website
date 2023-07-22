<!doctype html>
<html>
 <?php
session_start();
if ($_SESSION['log'] == '')
{
    header("location:../Login.html");
}else{
 include_once "../connect.php";
 
 
         $logout_id = $_SESSION[ 'userid' ];

            $status = "Offline now";
            $sql = mysqli_query($connect, "UPDATE customers SET status = '{$status}' WHERE Customer_ID=$logout_id");
            if($sql){
              unset($_SESSION[ 'email' ]);
              unset($_SESSION[ 'lname' ]);
              unset($_SESSION[ 'userid' ]);
              unset($_SESSION[ 'cart' ]);
              unset($_SESSION[ 'log' ]);
              unset($_SESSION['incoming_id']);
                session_unset();
                session_destroy();
                header("location:../Login.html");
            }
        else{
            header("location: User-Profile.php");
        }
}
?>
 
 
