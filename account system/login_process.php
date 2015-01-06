<?php
session_start();
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM admin WHERE username='".$username."' AND pass='".$password."' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	
	$month = $res['month']; // month in database
	$today = date ('M'); // current month
	if (mysql_num_rows($res) > 0)
	{
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: Admin Account.php");
		exit();
	}
}
	
	
	
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM users WHERE username='".$username."' AND pass='".$password."' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) > 0){
	if ($month==$today)
	{
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}
	else{

		$query= mysql_query ("UPDATE users SET month = '$today' , quantity = '3' WHERE username='".$username."' AND pass='".$password."' LIMIT 1");
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
		}
	}
else{
header ("Location: login.php?msg=2");
exit();
	}
}



	
?>