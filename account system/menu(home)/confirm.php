<?php
$dbuser="root";
$dbpass="";
$dbhost="localhost";
$conn = mysql_connect($dbhost,$dbuser,$dbpass);

if(! $conn)
{
	die('could not connect: '. mysql_error());
}
require ("connect.php");
$Jbank=$_POST['Jbank'];
$Nakaun=$_POST['Nakaun'];
$perkara=$_POST['perkara'];
$Jbayaran=$_POST['Jbayaran'];
$date=$_POST['date'];
$time=$_POST['time'];
$submit=$_POST['send'];

if($submit)
{
	if($Jbank && $Nakaun && $perkara && $Jbayaran && $date && $time)
	{
		$sql = "INSERT INTO account (Jamaun, perkara, tarikh, masa, Jbank, Nbank) VALUES ('$Jbayaran','$perkara','$date','$time','$Jbank','$Nakaun')";
		
		mysql_select_db('sistem_akaun');
		$retval =  mysql_query($sql, $conn);
		if ($retval)
		{
			echo "<b>SUCCESS!!!</b>";
		}
		else
		{
			die('could not get data : '. mysql_error());;
		}
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

<form action="confirm.php" method="POST">
<table align="center">

<tr>
<td align="center">Jenis Bank</td>
</tr>
<tr>
<td><select name="Jbank" id="select">
<option></option>
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
<input type="text" name="Nakaun" placeholder="Number Akaun">
</td><br />
</tr>

<tr>
<td align="center">
<input type="text" name="perkara" placeholder="Perkara">
</td>
</tr>

<tr>
<td align="center">Jenis Pembayaran :</td>
</tr>
<tr>
<td align="center">
<select name="Jbayaran" id="select">
<option></option>
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
<input type="date" id="select" name="date" placeholder="Tarikh" align="middle">
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input type="time" name="time" id="select" placeholder="Masa" align="middle">
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