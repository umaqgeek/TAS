<?php
session_start();
error_reporting(0);
require("connect_manageUser.php");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="css/lay_menu.css" />
<link rel="stylesheet" href="css/susun_menu.css" />
<link rel="stylesheet" href="css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cornfirm</title>

</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />

<div id="container">

<div id="Header">
<h1>
<b>Tuffah Account Management System</b>
</h1>
</div>

<div id="Nav">

<nav>
<ul>
<li><a href="Admin Account.php">Home</a></li>
<li><a href="index_register.php">User Registration</a></li>
<li><a href="#">User Account</a></li>
<li><a href="Admin_home.php">Report</a></li>
<li><a href="Admin Manage User/setting.php">Setting</a></li>
<li><a href="logout.php">Logout</a></li></ul>
</nav>

</div><!--Nav-->

<br  /><br  /><br  /><br  /><br  />
<fieldset>
<form>

<table border="1" bordercolor="#000000" width="750px" align="center">
<tr>
	<td align="center"><b>id</b></td>
	<td align="center"><b>Username</b></td>
	<td align="center"><b>Password</b></td>
	<td align="center"><b>Fullname</b></td>
	<td align="center"><b>I/C Number</b></td>
	<td align="center"><b>Phone Number</b></td>
	<td align="center"><b>Email</b></td>
	<td align="center"><b>Address</b></td>
    <td colspan="2"></td>
	</tr>
  

<?php
session_start();
$result=mysql_query("select * from users");
$i = 1;


while($rows=mysql_fetch_array($result))
{
	$user=$rows['username'];
		
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['username'].'</td>';
	echo'<td width="100" align="center">'.$rows['pass'].'</td>';
	echo'<td width="100" align="center">'.$rows['Fname'].'</td>';
	echo'<td width="100" align="center">'.$rows['ic'].'</td>';
	echo'<td width="100" align="center">'.$rows['tel'].'</td>';
	echo'<td width="100" align="center">'.$rows['email'].'</td>';
	echo'<td width="100" align="center">'.$rows['address'].'</td>';
	
	echo'<td><a href="update_register.php?username='.$user.'">Edit</a></td>';
	echo'<td><a href="delete_register.php?username='.$user.'">Delete</a></td>';
	echo'</tr>';
	
	$i++;
}


?>

</table>
</form>


<center>
<a href="index_register.php"><input type="button" value="Add" /></a>
</center>

</fieldset>
</div><!--Container-->
</body>
</html>