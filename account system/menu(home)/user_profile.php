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
$p=$_SESSION['pass'];
echo $i ." and ". $p;
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
        <li><a href="#">Profile</a></li>
      	<li><a href="../logout.php">Log out</a></li>
	</ul>
	</div>
    <br />
    <br />

</div>







<?php
$sql = "SELECT * FROM users WHERE username='" .$i. "' AND pass = '".$p."'";
$query = mysql_query($sql);
while($call=mysql_fetch_array($query)){
	
	$username = $call['username'];
	$pass = $call['pass'];
	$Fullname = $call['Fname'];
	$email = $call['email'];
	$ic = $call['ic'];
	$tel = $call['tel'];
	$address = $call['address'];
}

	
//	echo "<table align='center'>";
//	echo "<tr><td>Username</td>";
//	echo "<td>:</td>";
//	echo "<td>" .$call['username']. "</td></tr>";
	
//	echo "<tr><td>Password</td>";
//	echo "<td>:</td>";
//	echo "<td>".$call['pass']. "</td></tr>";
	
//	echo "<tr><td>E-mail</td>";
//	echo "<td>:</td>";
//	echo "<td>".$call['email']. "</td></tr>";
	
//	echo "<tr><td>Phone Number</td>";
//	echo "<td>:</td>";
//	echo "<td>".$call['tel']. "</td></tr>";
	
//	echo "<tr><td>Full Name</td>";
//	echo "<td>:</td>";
//	echo "<td>".$call['Fname']. "</td></tr>";
	
//	echo "<tr><td>Address</td>";
//	echo "<td>:</td>";
//	echo "<td>".$call['address']. "</td></tr>";
	
//	echo "</table>";	





?>
<div>
<form action="" method="POST" class="table">
<table align="center">




<tr>
<td>Username</td>
<td>:</td>
<td><?php echo $username ?></td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td><?php echo $pass ?></td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td><?php echo $Fullname ?></td>
</tr>

<tr>
<td>Email</td>
<td>:</td>
<td><?php echo $email ?></td>
</tr>

<tr>
<td>I/C Number</td>
<td>:</td>
<td><?php echo $ic ?></td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td><?php echo $tel ?></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><?php echo $address ?></td>
</tr>

<tr>
<td><a href="user_editProfile.php"><input type="button" name="Edit" value="Edit" /></a></td>
</tr>

</table>
</form>
</div>

</body>
</html>
