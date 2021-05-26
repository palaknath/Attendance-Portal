<?php
//login.php

include("dbconnect.php");

if(isset($_COOKIE["type"]))
{
 header("location:index.php");
}

session_start();

$message = '';

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
 };

if(isset($_POST["login"]))
{

    $u=$_POST['user_email'];
    $p=$_POST['user_password'];
    
   $result=mysqli_query($con,"select * from admin where Username='$u' and user_password='$p'");

   //If user is valid then record Time
   if(mysqli_num_rows($result)>0)
   {  
	  $t=time();
	  date_default_timezone_set('Asia/Kolkata');
    $date_time = date("Y-m-d h:i:sa",$t);
    
    $date_today=date("Y-m-d") ;
     
      $ipadd=getUserIpAddr();
      $ipadd = mysqli_real_escape_string($con,$ipadd);
	   
	   $insert  = mysqli_query($con,"INSERT INTO access_log SET Username = '$u', date_= '$date_today', Checkin_datetime = '$date_time',userIP='$ipadd'");

     setcookie("user", $u, time() + (86400),"/");
     setcookie("IP",$ipadd, time() + (86400),"/");

     //  $_SESSION["IP"] = "$ipadd";
      // $_SESSION['user_email']="$u";

$sql = "SELECT MAX(ID) FROM access_log WHERE Username = '$u'";
$record = mysqli_query($con,$sql);
$row = mysqli_fetch_row($record);
echo $row[0];


$_SESSION['myid'] = $row[0];

setcookie("type", $row[0], time()+86400); // 1 day
    header("location:index.php");

    ?>
    <script>
       alert("You have logged in");
    </script>
  <?php
   }
   else
   {
    ?>
    <script>
       alert("Incorrect username or password");
    </script>
  <?php
   }

}

?>



<html>
<head>
<link rel="stylesheet" href="style/login_style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<title>User Page</title>
<body>
  

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
  <div class="fadeIn first">
    <img src="data:image/png;base64,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" id="icon" alt="User Icon" />
  </div>
    
   
    <!-- Login Form -->
    <form method="POST">
     <input type="text" id="user_email" class="fadeIn second" maximum="8" name="user_email"  placeholder="Username">
     <input type="text" id="user_password" class="fadeIn third" maximum="8" name="user_password" placeholder="Password">
     <!-- input type="submit" class="fadeIn fourth" name="adminlog" value="Log In"> -->
     <input type="submit" name="login" id="login" class="fadeIn fourth" value="Login" />
    </form>


  </div>
</div>
</body>
</html>