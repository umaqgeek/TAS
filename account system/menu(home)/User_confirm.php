<?php
session_start();
error_reporting(0);
require ("User_connect.php");
$name=$_POST['name'];
$email=$_POST['email'];
$Jbank=$_POST['Jbank'];
$Nakaun=$_POST['Nakaun'];
$perkara=$_POST['perkara'];
$Jbayaran=$_POST['Jbayaran'];
$jumlah=$_POST['jumlah'];
$date=$_POST['date'];
$time=$_POST['time'];
$i=$_SESSION['username'];
$y= 'hello';
	
	
	
	date_default_timezone_set("Asia/Kolkata"); 
	
	$month = $res['month']; // month in database
	$today = date ('M'); // current month
	
	$day = $res['day']; // day in database
	$now = date ('d'); // current time
	
	echo $now . $today . date('Y');
	echo "<br/>week = ". date('W');
	
	
$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Kredit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$total =  $row['SUM(jumlah)'];
}
$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Debit'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$deb =  $row['sum(jumlah)'];
}



$sum = $total - $deb;

$quantity = mysql_query("SELECT * FROM users WHERE username = '$i'");
$q = mysql_fetch_array ($quantity);
$quan = $q['quantity'];

$weekQuantity = mysql_query("SELECT * FROM users WHERE username = '$i'");
$wq = mysql_fetch_array ($weekQuantity);
$QuanWeek = $wq['weekQuantity'];

$dayQuantity = mysql_query("SELECT * FROM users WHERE username = '$i'");
$dq = mysql_fetch_array ($dayQuantity);
$Quanday = $dq['dayQuantity'];


echo "<h1 align='center'>$y $i $sum</h1>";



if(isset($_GET['logout']) && $_GET['logout'] == "true"){
	session_destroy();
	echo "<br/>Successfully logged out.";
	header ("Location: login.php");
	exit();
}
$submit=$_POST['send'];
if($submit)
{
	if ($name && $email && $Jbank && $Nakaun && $perkara && $Jbayaran && $date && $time && $jumlah)
	{
		if($_POST["name"] != $i)
		{
			echo "Sorry, sender must be own of this account\n\n";
			$_SESSION['auth']=true;
			header ("Location: User_Ownsite.php");
			exit();
		}
		
		else if($_POST['Jbayaran'] == "Kredit" && $quan < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: User_Confirm 1st.php?msg=1");
			exit();
		}else if($_POST['Jbayaran'] == "Kredit" && $QuanWeek < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: User_Confirm 1st.php?msg=2");
			exit();
		}else if($_POST['Jbayaran'] == "Kredit" && $Quanday < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: User_Confirm 1st.php?msg=3");
			exit();
		}
		
		else if($_POST['Jbayaran'] == "Debit" && $sum < $jumlah){
			echo "Sorry lah derrr baki account tidak mencukupi untuk buat pengeluaran..";
			$_SESSION['auth']=true;
			header ("Location: User_Confirm 1st.php?msg=4");
			exit();
		}
		else{
				$sql = "INSERT INTO account (name, email, Jamaun, jumlah, perkara, tarikh, masa, Jbank, Nbank)
				VALUES('$name','$email','$Jbayaran','$jumlah','$perkara','$date','$time','$Jbank','$Nakaun')";
				
				mysql_select_db('sistem_akaun');
				$retval =  mysql_query($sql, $conn);
				if ($retval)
				{
					if($_POST['Jbayaran'] == "Kredit"){
						if($quan && $QuanWeek && $Quanday >= $jumlah){
							$new = $quan - $_POST['jumlah'];
							$sequal = "UPDATE users SET quantity = '$new' WHERE username = '$i'";
							$sets =  mysql_query ($sequal);
							
							$newWeek = $QuanWeek - $_POST['jumlah'];
							$Sequalweek = "UPDATE users SET weekQuantity = '$newWeek' WHERE username = '$i'";
							$SetWeek = mysql_query ($Sequalweek);
							
							$newday = $Quanday - $_POST['jumlah'];
							$Sequalday = "UPDATE users SET dayQuantity = '$newday' WHERE username = '$i'";
							$SetDay = mysql_query ($Sequalday);
							
							
							$_SESSION['auth']=true;
							header ("Location: User_FormSend.php");
							exit();
						}
					 	else{
							$_SESSION['auth']=true;
							header ("Location: User_FormSend.php");
							exit();
						}
					}else{
						$_SESSION['auth']=true;
						header ("Location: User_FormSend.php");
						exit();
					}
				}
				else{
					die('could not get data : '. mysql_error());;
				}
		}
	}
	else{
			$_SESSION['auth']=true;
			header ("Location: User_Confirm 1st.php?msg=5");
			exit();
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="../Menu_css/index_css.css" />
<link rel="stylesheet" href="../Menu_css/form.css" />
</head>
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