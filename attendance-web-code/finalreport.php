<?php 
include("dbconnect.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
     <title>Admin Panel</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="
     sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="style/adminstyle.css" rel="stylesheet">
</head>
<body>
<div class ="header">
<div class="col-md-6 no-gutters">
   <br>
   <img id="logo-white-img" class="img-center" src="https://tag8.in/assets/newtheme/images/logo-customizer-white/tag8-white.png" alt="">
<h1 class="admin_head">ADMIN PANEL</h1>
<br>
</div>
</div>
<div class ="row no-gutters">
   <div class="col-md-6 no-gutters">
<div class="leftside">
<h1>ATTENDANCE REPORT</h1>
    <br>
    <h3>Select Date</h3>
    <form method="POST">
    <input type="date" name="today_date">
    <input type="submit" name="getreport" id="getreport" class="fadeIn fourth" value="Get Report" required/>
    </form>
    <br>
    <form method='post' action='download.php'>
   <input type='submit' value='Export' name='Export'>  
   <br>
   <br>
  <table border='1' style='border-collapse:collapse;'>
    <tr>
     <th>Name</th>
     <th>IP Address</th>
     <th>Checkin Time</th>
     <th>Checkout Time</th>
    </tr>

<?php 
   if(isset($_POST["getreport"]))

    echo 'Getting Reports ....';
    $date_today=$_POST['today_date'];
    echo $date_today;

     $query = "SELECT Username,userIP,Checkin_datetime,Checkout_datetime FROM access_log WHERE date_ ='$date_today'";
     $result = mysqli_query($con,$query);
     $user_arr = array();

     while($row = mysqli_fetch_array($result)){

      $uname = $row['Username'];
      $name = $row['userIP'];
      $in_time = $row['Checkin_datetime'];
      $out_time = $row['Checkout_datetime'];
   
      $user_arr[] = array($uname,$name,$in_time,$out_time);
    
?>

      <tr>
       <td><?php echo $uname; ?></td>
       <td><?php echo $name; ?></td>
       <td><?php echo $in_time; ?></td>
       <td><?php echo $out_time; ?></td>
      </tr>

<?php
    }
?>
   </table>
   <br>
  
   <?php 
    $serialize_user_arr = serialize($user_arr);
   ?>
  <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
 </form>
   </div>
</div>

<div class="col-md-6 no-gutters">
<div class="rightside">
<div class=contact-box>
<h1>ADD NEW USER</h1>
<br>
<form action=" " method="POST">
<h3>Username</h3>
<input type="text" name="username">
<h3>Password</h3>
<input type="text" name="user_password">
<br>
<br>
<input type="submit" value="Insert User" name="add_user">
</div>

</div>
   </div>
</div>
<?php

$con=mysqli_connect('localhost','root','');
$db=mysqli_select_db($con,'attendancedbFinal');

 if(isset($_POST["add_user"]))
 {
 $un=$_POST['username'];
 $pw=$_POST['user_password'];

 $sql = "INSERT INTO admin (Username,user_password) VALUES ('$un','$pw')";

  if ($con->query($sql) === TRUE)
  { echo "New record created successfully";}
   else
    { echo "Error: " . $sql . "<br>" . $con->error;}

 }
?>

</body>
</html>