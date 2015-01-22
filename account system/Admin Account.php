<?php
session_start();
error_reporting(0);
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

$i=$_SESSION['username'];
$y= 'hello';
echo "<h2 align='center'>$y $i</h2>";


if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: index.php");
	exit();
}
?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="css/lay_menu.css">
<link rel="stylesheet" type="text/css" href="css/susun_menu.css">
<title>Account Admin</title>
</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />



<div id="container">

<div id="Header"><h1><b>Tuffah Account Management System</b></h1>
</div>

<div id="Nav">

<nav>
<ul>
<li><a href="#">Home</a></li>
<li><a href="index_register.php">User Registration</a></li>
<li><a href="register.php">User Account</a></li>
<li><a href="Admin_home.php">Report</a></li>
<li><a href="Admin Manage User/setting.php">Setting</a></li>
<li><a href="logout.php">Logout</a></li></ul>
</nav>
</div><!--Nav-->





</div><!--container-->

</body>
</html>