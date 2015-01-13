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
	$row = mysql_fetch_array($res, MYSQL_ASSOC);
	

    date_default_timezone_set("Asia/Kolkata"); 
	$calMonth = 
	$month = $row['month']; // month in database
	$today = date ("M"); // current month
	
	$week = $row['week']; // week in database
	$latest = date("W"); //current week
	
	$day = $row['day']; // day in database
	$now = date ("d"); // current time
	
	
	if (mysql_num_rows($res) > 0){
		
	if ($month==$today) 
	{
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}
	else{
		$query= mysql_query ("UPDATE users SET month = '$today' , quantity = '3000' WHERE username='".$username."' AND pass='".$password."' LIMIT 1");
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}
		
	if($week==$latest){
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}else{
		$Query= mysql_query ("UPDATE users SET week = '$latest' , weekQuantity = '1000' WHERE username='".$username."' AND pass='".$password."' LIMIT 1");
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}
		
	if($day==$now){
		$_SESSION['auth']=true;
		$_SESSION['username']= $_POST['username'];
		header ("Location: menu(home)/User_home.php");
	}else{
		$Query= mysql_query ("UPDATE users SET day = '$now' , dayQuantity = '500' WHERE username='".$username."' AND pass='".$password."' LIMIT 1");  
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