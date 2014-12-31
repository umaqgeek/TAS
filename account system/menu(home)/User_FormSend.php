<?php
session_start();
error_reporting(0);
require ("User_connect.php");
$name=$_POST['name'];
$email=$_POST['email'];
$Jbank=$_POST['Jbank'];
$Nakaun=$_POST['Nakaun'];
$jumlah=$_POST['jumlah'];
$perkara=$_POST['perkara'];
$Jbayaran=$_POST['Jbayaran'];
$date=$_POST['date'];
$time=$_POST['time'];

$i=$_SESSION['username'];
$y= 'hello';
echo "<h1 align='center'>$y $i</h1>";
if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
}
$submit=$_POST['send'];

if($submit)
{
	if ($name && $email && $Jbank && $Nakaun && $jumlah && $perkara && $Jbayaran && $date && $time)
	{
		if($_POST["name"] != $i)
		{
			header ("Location:User_Ownsite.php");
			exit();
		}
		else
	{
				$sql = "INSERT INTO account (name, email, Jamaun, jumlah, perkara, tarikh, masa, Jbank, Nbank)
				VALUES('$name','$email','$Jbayaran','$jumlah','$perkara','$date','$time','$Jbank','$Nakaun')";
			
				mysql_select_db('sistem_akaun');
				$retval =  mysql_query($sql, $conn);
				if ($retval)
				{
					echo "<b>SUCCESS!!!</b><br/>";
					echo "Your form is sent!!!";
					echo "wait for the email from us";
					$_SESSION['auth']=true;
					header ("Location: User_confirm.php");
					exit();  
				}
				else
				{
					die('could not get data : '. mysql_error());;
				}

		}
	}
	else{
		/*echo "insert your detail to all form";*/
		$_SESSION['auth']=true;
		header ("Location: CheckForm.php");
		exit();
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />

<body background="black and white lights street lights 1920x1200 wallpaper_wallpaperswa.com_45.jpg">

<div class="header">
	<div>
        	<a><img src="../tuffahlogo.png" width="199" height="135" /></a>
	</div>
        
    <div>
    <ul>
      	<li><a href="User_home.php">Home</a></li>
        <li><a href="User_index(home).php">Account Form</a></li>
        <li><a href="#">Profile</a></li>
      	<li><a href='?logout=true'>Log out</a></li>
	</ul>
	</div>
    <br />
    <br />




<form action="" method="POST">


<table align="center">
<tr>
<td align="center">
<font color="#CC9900">
<p align='center'>
<img src="" width="15" height="15" />
   Congratulation!!!Your form is send!!!<br />
   Wait for the email from us!
   </p>
</font>
</td>
</tr>

<tr>
<td align="center">
<input id="type" type="text" placeholder="Username" name="name" value="<?php echo $_POST['name']; ?>" />
</td>
</tr>

<tr>
<td align="center">
<input id="type" type="email" placeholder="E-mail" name="email" value="<?php echo $_POST['email']; ?>" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Pembayaran :</b></td>
</tr>
<tr>
<td align="center">
<select name="Jbayaran" id="select">
<option><?php echo $_POST['Jbayaran']; ?></option>
<option>Debit</option>
<option>Kredit</option>
</select>
</td>
</tr>

<tr>
<td align="center">
<input id="type" type="text" placeholder="Perkara" name="perkara" value="<?php echo $_POST['perkara']; ?>" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Bank</b></td>
</tr>
<tr>
<td>
<select name="Jbank" id="select">
<option><?php echo $_POST['Jbank']; ?></option>
<option>Bank Islam</option>
<option>Maybank</option>
<option>AgroBank</option>
<option>Bank Rakyat</option>
<option>Tabung Haji</option>
<option>CIMBank</option>
<option>Bank Simpanan Berhad(BSN)</option>
</select>
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" id="type" placeholder="Number Akaun" name="Nakaun" value="<?php echo $_POST['Nakaun']; ?>" />
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" id="type" placeholder="Jumlah Amaun" name="jumlah" value="<?php echo $_POST['jumlah']; ?>" />
</td><br />
</tr>

<tr>
<td align="center"><b>Tarikh</b></td>
</tr>
<tr>
<td align="center">
<input type="date" placeholder="Tarikh" id="select" name="date" value="<?php echo $_POST['date']; ?>" />
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>

<td align="center">
<input type="time" placeholder="Masa" name="time" id="select" value="<?php echo $_POST['time']; ?>" />
</td>
</tr>

<tr>
<td align="center">
<input type="submit" name="send" value="Send" />
</td>
</tr>




</table>

</form>
</div>
</body>
</html>



