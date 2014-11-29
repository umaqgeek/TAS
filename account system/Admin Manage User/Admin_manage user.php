<?php

require("connect.php");
$id = $_POST['id'];
$username = $_POST['name'];
$pass = $_POST['password'];
$Fname = $_POST['fname'];
$ic = $_POST['ic'];
$tel = $_POST['phone'];
$Email = $_POST['email'];
$address = $_POST['address'];
$submit = $_POST['submit'];
if($submit)
{
	if($username && $pass && $id && $Fname && $Email && $address && $ic && $tel)
	{
		$insert = mysql_query ("INSERT INTO users (id, username, pass, Fullname, I/C_Number, Phone_no, Email, Address) VALUES ('$username','$pass','$Fname','$ic','$tel','$Email', '$address')");
		echo "You have a new data..";
	}
	else{
		echo "Please fill out the fields";
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage User</title>

</head>

<body>

<h1 align="center"><b><i>User Profile</i></b></h1>

<center><form action="Admin_manage user.php" method="post">

<table align="center">
<tr>
<td>ID Number</td>
<td>:</td>
<td><input name="id" type="text"></td>
</tr>

<tr>
<td>Username</td>
<td>:</td>
<td><input name="name" type="text"></td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td><input type="text" name="password"></td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td><input type="text" name="fname"></td>
</tr>

<tr>
<td>ic number</td>
<td>:</td>
<td><input name="ic" type="text"></td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td><input type="text" name="phone"></td>
</tr>

<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email" type="text"></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><input type="text" name="address"></td>
</tr>
</table>



<input type="submit" value="submit" name="submit">
<input type="reset" value="Reset" name="reset">
</form>
</center>

<a href="../Admin_User Account.php">Back</a>

</body>
</html>