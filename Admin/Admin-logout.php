
 <?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}else
session_destroy();
header("location:../Login.html");
?>
 
 
 
