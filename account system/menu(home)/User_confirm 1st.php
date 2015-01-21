<?php
error_reporting(0);
session_start();
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikh = date("d/M/Y");
$jam = date("H/i/s A");


$i=$_SESSION['username'];
$link=$_SESSION['id'];
$y= 'hello';
echo "$y $i";


if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
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
        <li><a href="User_CheckTransaction.php">Check Transaction</a></li>
        <li><a href="user_profile.php">Profile</a></li>
      	<li><a href="../logout.php">Log out</a></li>
	</ul>
	</div>
    <br />
    <br />




<form action="User_confirm.php" method="POST">
<table align="center">
<?php

if (isset($_GET['msg']))
{
	$message = $_GET['msg'];
	if($message == 0)
	echo "<span style='color:red'>Sorry, sender must be own of this account</span>";
	if($message == 1)
	echo "<span style='color:red'>Sorry lah derrr dah limit untuk bulan ini..</span>";
	if($message == 2)
	echo "<span style='color:red;'>Sorry lah derrr dah limit untuk minggu ini..</span>";
	if($message == 3)
	echo "<span style='color:red;'>Sorry lah derrr dah limit untuk hari ini..</span>";
	if($message == 4)
	echo "<span style='color:red;'>Sorry lah derrr baki account tidak mencukupi untuk buat pengeluaran..</span>";
	if($message == 5)
	echo "<span style='color:red;'>Sila semak form anda</span>";
	if($message == 6)
	echo "<span style='color:red;'>Sorry lah derrr setiap transaksi hanya boleh dibuat kurang dari rm3000..</span>";
	if($message == 7)
	echo "<span style='color:green;'>Congrates!!!</span>";
}
?>
<tr>
<td align="center">
<input id="type" type="text" placeholder="Username" name="name" value="<?php echo $i  ?>" />
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
<option><?php echo $_POST['Jbank'] ?></option>
<?php 
$callJbank=mysql_query("SELECT * FROM jenis_bank");
while($call=mysql_fetch_array($callJbank)){
?>
<option value="<?php echo $call['jenis_bank'] ?>"><?php echo $call['jenis_bank'] ?></option>
<?php }?>
</select>
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
<input placeholder="Tarikh" id="type" name="date" value="<?php echo $tarikh ?>" />
</td>
</tr>

<tr>
<td align="center"><b>Masa</b></td>
</tr>
<tr>
<td align="center">
<input placeholder="Masa" name="time" id="type" value="<?php echo $jam ?>" />
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



<?php

$query = "SELECT Jamaun, COUNT(name), SUM(jumlah) FROM account WHERE name='" .$i. "' AND link_id='".$link."' GROUP BY Jamaun "; 
$result = mysql_query($query) or die(mysql_error());

// Print out result from user amount transacation
while($row = mysql_fetch_array($result)){
	echo "You have ". $row['COUNT(name)'] ." ". $row['Jamaun'] ."<br/> And total from your ". $row['Jamaun']. " = RM". $row['SUM(jumlah)'] ;
	echo "<br /><br/>";

}

//total account balance - total user debit
$sqlbaki=mysql_query("SELECT Baki FROM setting");
while($baki=mysql_fetch_array($sqlbaki)){
	$akaun=$baki['Baki'];
	}

$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Debit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$debit =  $row['SUM(jumlah)'];
}

$deb = $debit + $akaun;


$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Kredit' and name = '" .$i. "' AND link_id='".$link."'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$Cre =  $row['sum(jumlah)'];
}

echo "<br /><b>Total balance from account</b>(".$deb.") - <b>Credit</b>(".$Cre.")";
echo "<br />Balance = ". ($deb - $Cre);



//limit for user transaction (per/month)
$limit = "SELECT month, SUM(quantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$M = mysql_query($limit);
while ($month = mysql_fetch_array($M)){
	$monthQuantity = $month['SUM(quantity)'];
	if ($monthQuantity == 0){
		echo "<br/>You have a limit transaction for this week.Sila cuba lagi dibulan hadapan";
	}else{
		echo "<br/>your limit of debit for this month is " .$monthQuantity;
	}
}

//limit for user transaction (per/week)
$Wlimit = "SELECT week, SUM(weekQuantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$W = mysql_query($Wlimit);
while ($week = mysql_fetch_array($W)){
	$weekQuantity = $week['SUM(weekQuantity)'];
	if ($weekQuantity == 0){
		echo "<br/>You have a limit transaction for this week..cuba lagi minggu depan";
	}else{
	echo "<br/>your limit of debit for this week is " .$weekQuantity;
	}
}

//limit for user transaction (per/day)
$Dlimit = "SELECT day, SUM(dayQuantity) FROM users WHERE username ='" .$i. "' AND id='".$link."'";
$D = mysql_query($Dlimit);
while ($day = mysql_fetch_array($D)){
	$dayQuantity = $day['SUM(dayQuantity)'];
	if ($dayQuantity == 0){
		echo "<br/>You have a limit transaction for today.Please try again tomorrow";
	}else{
	echo "<br/>your limit of debit for today is " .$dayQuantity. "<br/>";
	}
}


?>


</body>
</html>