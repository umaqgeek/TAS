<?php
error_reporting(0);
require("connect_manageUser.php");
$name=$_POST['name'];
$pass=$_POST['pass'];
$fname=$_POST['fname'];
$ic=$_POST['ic'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$address=$_POST['address'];
$submit=$_POST['submit'];



if($submit)
{
	if(isset($_POST["pass"]))
	{
			$pass = $_POST["pass"];
			include_once("strongpass.php");
			$strongpass = new strongpass();
			$response = $strongpass->check($pass);
			
			if($response !="OK"){
				$status = $response;
				echo "<b>Check your password</b>";
				$_SESSION['auth']=true;
				header ("Location: Admin_manage user.php");
				exit();
				}
	}
	
	if ($name && $pass && $fname && $ic && $tel && $email && $address)
	{
		$sql = "INSERT INTO users 
		(username, pass, Fname, ic, tel, email, address) 
		VALUES ('$name','$pass','$fname','$ic','$tel','$email','$address')";

		
		$retval = mysql_query($sql, $conn);
	
		if ($retval)
		{
		echo "<b>SUCCESS!!!</b>";
		}
		else
		{
		die('could not get data : '. mysql_error());;
		}
	}
	
	else{
		echo "<b>insert your detail to all form</b>";
		$_SESSION['auth']=true;
		header ("Location: index.php");
		exit();
	}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="../css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cornfirm</title>

</head>

<body>



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
	
	echo'<td><a href="update.php?username='.$user.'">Edit</a></td>';
	echo'<td><a href="delete.php?username='.$user.'">Delete</a></td>';
	echo'</tr>';
	
	$i++;
}


?>
</table>



</body>
</html>