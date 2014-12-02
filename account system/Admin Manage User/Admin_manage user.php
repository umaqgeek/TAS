<?php

require("connect_manageUser.php");
$name=$_POST['name'];
$pass=$_POST['pass'];
$fname=$_POST['fname'];
$ic=$_POST['ic'];
$tel=$_POST['tel'];
$submit=$_POST['submit'];
if($submit)
{
	if($name && $pass && $fname && $ic && $tel)
	{
		mysql_query ("INSERT INTO users (username, pass, Fname, I/C_Number, Phone_no) VALUES ('','" .$name. "','" .$pass. "','" .$fname. "','" .$ic. "','" .$tel. "')")or die ("Error inserting data into table");
echo "Data Inserted!";
//Closes specified connection
mysql_close($conn);
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
<title>comment Box</title>

</head>

<body>
<form action="Admin_manage user.php" method="POST">

<table>
<tr>
<td>username</td>
<td>:</td>
<td><input type="text" name="name" />
</td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td>
<input type="text" name="pass" />
<td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td>
<input type="text" name="fname" />
<td>
</tr>

<tr>
<td>I/C Number</td>
<td>:</td>
<td>
<input type="text" name="ic" />
<td>
</tr>

<tr>
<td>Phone Number</td>
<td>:</td>
<td>
<input type="text" name="tel" />
<td>
</tr>

<tr><td colspan="2"><input type="submit" name="submit" value="comment" /></td></tr>
</table>
</form>

</body>
</html>