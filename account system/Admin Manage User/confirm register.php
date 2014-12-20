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
	if($name && $pass && $fname && $ic && $tel && $email && $address)
	{
		if(isset($_POST["pass"]))
		{
			$pass = $_POST["pass"];
			if (strlen($pass)<8)
			{
				echo "Password must be at least 8 character \n\n";
				echo '<a href="index.php">back</a>';
			}
			else if(is_numeric($pass))
			{
				echo "Password must contain at least one letter \n\n";
				echo '<a href="index.php">back</a>';
			}
			else if (!preg_match('#[0-9]#', $pass))
			{
				echo "Password must contain at least one number  \n\n";
				echo '<a href="index.php">back</a>';
			}
			else
			{
				echo "Password strong!!!";
				$sql = "INSERT INTO users 
						(username, pass, Fname, ic, tel, email, address) 
						VALUES ('$name','$pass','$fname','$ic','$tel','$email','$address')";

						$retval = mysql_query($sql, $conn);
	
						if ($retval)
						{
						echo "<b>SUCCESS!!!</b>";
							$_SESSION['auth']=true;
							header ("Location: Admin_manage user.php");
							exit();
						}
			}
			$strongpass = new strongpass();
		}
	}
	else {
		echo "Please fill all data on the form";
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<h3 align="center">Confirm?</h3>

<form action="confirm register(xgune lg).php" method="POST" class="table">

<table align="center">

<tr>
<td>username</td>
<td>:</td>
<td>
<input type="text" name="name" value="<?php echo $_POST['name']; ?>" />
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
<tr>
<td colspan="3" align="left">
<a href="../Admin Account.php"><b>Back</b></a></td>
</tr>
</table>

</form>



</body>
</html>