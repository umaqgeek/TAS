<?php
session_start();
error_reporting();
$result=mysql_query("select * from account");

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
				
				header ("Location: p_1char(register).php");
				echo "<p align='center'><b>Password must be at least 8 character \n\n</b></p>";
				exit();
			}
			else if(is_numeric($pass))
			{
				echo "<p align='center'><b>Password must contain at least one letter \n\n</b></p>";
				header ("Location: p_1letter(register).php");
				exit();
			}
			else if (!preg_match('#[0-9]#', $pass))
			{
				echo "<p align='center'><b>Password must contain at least one number  \n\n</b></p>";
				header ("Location: p_1Num(register).php");
				exit();
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
							header ("Location: register.php");
							exit();
						}
			}
			$strongpass = new strongpass();
		}
	}
	else {
		header ("Location: fillAll(register).php");
		exit();
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../TAS/account system/css/lay_menu.css" />
<link rel="stylesheet" href="../TAS/account system/css/susun_menu.css" />
<link rel="stylesheet" href="../TAS/account system/css/Admin_ManageUser_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#CCCCCC">

<img src="tuffahlogo.png" />

<div id="container">

<div id="Header">
<h1>
<b>Tuffah Account Management System</b>
</h1>
<h3 align="center">Confirm?</h3>
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


<form action="" method="POST" class="table">

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
<br/>
</td>
</tr>
<tr>
<td colspan="2"></td>
<td>
<img src="ico_crisis_issues_management.png" width="15" height="15" />
<font color="#996600">Password must contain at least one number</font>
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

