<?php
session_start();
error_reporting(0);
require("connect.php");


$i=$_SESSION['username'];
$y= 'hello';
echo "<h2 align='center'>$y $i</h2>";

if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
}

?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="css/lay_menu.css" />
<link rel="stylesheet" type="text/css" href="css/susun_menu.css" />
<link rel="stylesheet" href="css/Admin_ManageUser_css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>confirm dulu</title>
</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />



<div id="container">

<div id="Header">
<h1><b>Tuffah Account Management System</b></h1>
</h1>
<h3 align="center">Confirmation data</h3>
</div>

<div id="Nav">

<nav>
<ul>
<li><a href="Admin Account.php">Home</a></li>
<li><a href="index_register.php">User Registration</a></li>
<li><a href="register.php">User Account</a></li>
<li><a href="Admin_home.php">Report</a></li>
<li><a href='?logout=true'>Logout</a></li></ul>
</nav>
</div><!--Nav-->


<br  /><br  /><br  /><br  /><br  />
<fieldset>

<form action="confirm register.php" method="POST" class="table">

<table align="center">

<tr>
<td>username</td>
<td>:</td>
<td>
<input type="text" name="name" value="<?php echo $_POST['name'] ?>" />
</td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td>
<input type="text" name="pass" value="<?php echo $_POST['pass']; ?>" />
</td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td>
<input type="text" name="fname" value="<?php echo $_POST['fname'];  ?>" />
</td>
</tr>

<tr>
<td>I/C Number</td>
<td>:</td>
<td>
<input type="text" name="ic" value="<?php echo $_POST['ic']; ?>" />
</td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td>
<input type="text" name="tel" value="<?php echo $_POST['tel']; ?>" />
</td>
</tr>

<tr>
<td>E-mail</td>
<td>:</td>
<td>
<input type="text" name="email" value="<?php echo $_POST['email']; ?>" />
</td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td>
<input type="text" name="address" value="<?php echo $_POST['address']; ?>" />
</td></tr>




<tr>
<td colspan="3" align="left">
<input type="submit" name="submit" value="Add" />
</td>
</tr>

</table>

</form>
</fieldset>

</div><!--Container-->
</body>
</html>