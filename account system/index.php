<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="css/menu(home)_css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home(index)</title>
</head>

<body>

<center><img src="tuffahlogo.png" id="img"></center>

<form action="menu(home)/confirm.php" method="POST">
<table align="center">

<tr>
<td align="center"><b>Jenis Bank</b></td>
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
<td align="center"><b>Jenis Pembayaran :</b></td>
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
<input id="select" type="date" name="date" placeholder="Tarikh" align="middle">
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input type="time" id="select" name="time" placeholder="Masa" align="middle">
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