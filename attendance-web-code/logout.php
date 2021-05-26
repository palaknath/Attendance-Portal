<?php
//logout.php
include("dbconnect.php");

$con=mysqli_connect('localhost','root','');
$db=mysqli_select_db($con,'attendancedbFinal');

if(! $con ) { 
    die('Could not connect to database: ' . mysql_error());
 }
   $t=time();
   date_default_timezone_set('Asia/Kolkata');
   $date_time = date("Y-m-d h:i:sa",$t);

    $abc = $_COOKIE["type"];  

    echo "You are successfully logged out! ";
    //"SELECT MAX(ID) FROM access_log WHERE Username = '$u'"
    $sql = "UPDATE access_log SET Checkout_datetime = '$date_time' WHERE ID =$abc";
    $retval = mysqli_query($con,$sql);

    if(! $retval ) {
      die('Could not update data: ' . mysqli_error($con));
   }
   echo "Data updated successfully\n";
   mysqli_close($con); 

   setcookie("user", "", time()-86400); // 1 day
   setcookie("IP", "", time()-86400); // 1 day
setcookie("type", "", time()-86400); // 1 day
header("location:login.php");



?>