<?php
$hostname  = 'localhost';
$username = 'root';
$password='';
$dbname = 'Aayurveda';
$connect =  mysqli_connect($hostname , $username , $password ,$dbname) or die("Error Connecting");
?>