<?php
session_start();
error_reporting(0);
require ("connect.php");
$name=$_POST['name'];
$Jbank=$_POST['Jbank'];
$Nakaun=$_POST['Nakaun'];
$perkara=$_POST['perkara'];
$Jbayaran=$_POST['Jbayaran'];
$date=$_POST['date'];
$time=$_POST['time'];

$i=$_SESSION['username'];
$y= 'hello';
echo "<h1 align='center'>$y $i</h1>";

$submit=$_POST['send'];

if($submit)
{
	if ($name && $Jbank && $Nakaun && $perkara && $Jbayaran && $date && $time)
	{
		if($_POST["name"] != $i)
		{
			echo "Sorry, sender must be own of this account\n\n";
		}
		else
	{
				$sql = "INSERT INTO account (name, Jamaun, perkara, tarikh, masa, Jbank, Nbank)
				VALUES('$name','$Jbayaran','$perkara','$date','$time','$Jbank','$Nakaun')";
			
				mysql_select_db('sistem_akaun');
				$retval =  mysql_query($sql, $conn);
				if ($retval)
				{
					echo "<b>SUCCESS!!!</b><br/>";
					echo "Your form is sent!!!";
				}
				else
				{
					die('could not get data : '. mysql_error());;
				}

		}
	}
	else{
		echo "insert your detail to all form";
		$_SESSION['auth']=true;
		header ("Location: index(home).php");
		exit();
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../css/menu(home)_css.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<body>

<center><img src="../tuffahlogo.png" id="img"></center>

<form action="" method="POST">
<table align="center">

<tr>
<td align="center">
<input type="text" placeholder="Username" name="name" value="<?php echo $_POST['name']; ?>" />
</td>
</tr>

<tr>
<td align="center"><b>Jenis Bank</b></td>
</tr>
<tr>
<td><select name="Jbank" id="select">
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
<input type="text" placeholder="Number Akaun" name="Nakaun" value="<?php echo $_POST['Nakaun']; ?>">
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" placeholder="Perkara" name="perkara" value="<?php echo $_POST['perkara']; ?>">
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
<td align="center"><b>Tarikh</b></td>
</tr>
<tr>
<td align="center">
<input type="date" placeholder="Tarikh" id="select" name="date" value="<?php echo $_POST['date']; ?>">
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input type="time" placeholder="Masa" name="time" id="select" value="<?php echo $_POST['time']; ?>">
</td>
</tr>

<tr>
<td align="center">
<input type="submit" name="send" value="Send">
</td>
</tr>




</table>








</form>
</body>
</html>



