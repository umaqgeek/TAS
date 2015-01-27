
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
$checkA=mysql_query("SELECT * FROM users");

if($submit)
{
	if($name && $pass && $fname && $ic && $tel && $email && $address)
	{
		if(isset($_POST["pass"]))
		{
			$pass = $_POST["pass"];
			if (strlen($pass)<8)
			{
				header ("Location: register.php?msg=4");
				echo "<p align='center'><b>Password must be at least 8 character \n\n</b></p>";
				exit();
			}
			else if(is_numeric($pass))
			{
				echo "<p align='center'><b>Password must contain at least one letter \n\n</b></p>";
				header ("Location: register.php?msg=5.php");
				exit();
			}
			else if (!preg_match('#[0-9]#', $pass))
			{
				echo "<p align='center'><b>Password must contain at least one number  \n\n</b></p>";
				header ("Location: register.php?msg=6.php");
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
							header ("Location: register.php?msg=1");
							exit();
						}
			}
			$strongpass = new strongpass();
		}
	}
	else {
		header ("Location: register.php?msg=3");
		exit();
	}
}
?>