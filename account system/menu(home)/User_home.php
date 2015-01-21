<?php
session_start();
error_reporting(0);
$y= 'hello';
$i=$_SESSION['username'];
$p=$_SESSION['pass'];
$id = $_SESSION['id'];

echo "$y $i $id";


if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />

</head>

<body background="black and white lights street lights 1920x1200 wallpaper_wallpaperswa.com_45.jpg">

<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="#">Home</a></li>
        <li><a href="User_index(home).php">Account Form</a></li>
        <li><a href="User_CheckTransaction.php">Check Transaction</a></li>
        <li><a href="user_profile.php">Profile</a></li>
      	<li><a href="../logout.php">Log out</a></li>
	</ul>
	</div>
    <br /><?php echo $id?>
    <br />

</div>
</body>
</html>