<?php
//index.php
if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
}
?>

<?php session_start();?>

<!DOCTYPE html>
<html>
 <head>
  <title>tag8 Attendance</title>
  <style>
body {
  background: linear-gradient(to bottom, #68d8d6, #fff);
  background-repeat: no-repeat;
}
</style>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->
 </head>
 <body>
  <br />
  <div class="container">
   <h1 align="center">tag8 Attendance System</h1>
  <br>
   <center>
   <?php
 
   if(isset($_COOKIE["type"]))
   {
    echo '<h2 align="center">Welcome '.$_COOKIE["user"].'</h2>';
    echo "IP ADDRESS :".$_COOKIE["IP"]."<br>"; 
    //echo "UID : ".$_COOKIE["type"]."<br>";

   }
  
   ?>
      <br>
      <h2>
   <div align="center">
    <a href="logout.php">Logout</a>
   </div>
   </h2>
   <br />
  </div>
 </body>
</html>