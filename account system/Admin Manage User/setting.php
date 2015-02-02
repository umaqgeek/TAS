<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser ="root";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass)
or die ("Error connecting to MySQL");
$db = "sistem_akaun";
mysql_select_db($db) or
die ("Error connecting to Database: ".$dbname);

$set = '1';
$update = $_POST['update'];
$SQL = "SELECT * FROM setting WHERE id ='".$set."'";
$QUERY = mysql_query($SQL);
while($edit=mysql_fetch_array($QUERY)){
	$oldLimitMonth = $edit['MonthLimit']; 
	$oldLimitWeek = $edit['WeekLimit'];
	$oldLimitDay = $edit['DayLimit'];
	
}
if ($update){
	$newMOnthLimit = $_POST['Month'];
	$newWeekLimit = $_POST['Week'];
	$newDayLimit = $_POST['Day'];
	
	mysql_query("update setting set MonthLimit='" .$newMOnthLimit. "', WeekLimit='" .$newWeekLimit. "', DayLimit='" .$newDayLimit. "' WHERE id='".$set."' ");
	$_SESSION['auth']=true;
	header ("Location: setting.php");
	exit();
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<link rel="stylesheet" href="../css/style.css" />
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

</head>

<body>
  


	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">Settings</a></li>
						<li><a href="change password.php">Change Password</a></li>
						<li><a href="../logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">Home</a></li>
                <li><a href="../Admin Account.php" class="round button dark menu-email-special image-left">Account Report</a></li>
				<li><a href="register.php" class="round button dark menu-email-special image-left">Staff Table</a></li>
                <li><a href="../logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
	

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar (search bar) -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.html" class="active-tab dashboard-tab">Dashboard</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="../tuffahlogo.png" alt="Tuffah Informatic" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

<!--jumlah account------------------------------------------------>
	
<?php
            $query = "SELECT Jamaun, COUNT(name), SUM(jumlah) FROM account GROUP BY Jamaun"; 
$result = mysql_query($query) or die(mysql_error());

// Print out result
while($row = mysql_fetch_array($result)){
	//echo "- There are ". $row['COUNT(name)'] ." ". $row['Jamaun'] ."<br/> And ". $row['Jamaun']. " = RM". $row['SUM(jumlah)'] ;
	//echo "<br />";

}


$sqlbaki=mysql_query("SELECT Baki FROM setting");
while($baki=mysql_fetch_array($sqlbaki)){
	$akaun=$baki['Baki'];
	}
	

$sqlSum = "SELECT Jamaun, SUM(jumlah) FROM account WHERE Jamaun = 'Debit'"; 
$resSum = mysql_query($sqlSum) or die(mysql_error());
while ($row = mysql_fetch_array($resSum)){
	$debit =  $row['SUM(jumlah)'];
}

$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Kredit'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$Cre =  $row['sum(jumlah)'];
}


$deb = $debit + $akaun;
$balance = $deb - $Cre;
// echo "<br /><b>Debit</b>(".$debit.") - <b>Credit</b>(".$Cre.")";
// echo "<br />Baki = ". ($akaun + $debit - $Cre);
// echo "<br/>akaun syarikat = ". $akaun;
?>	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Side Menu</h3>
				<ul>
					<li><a href="#">Side menu link</a></li>
					<li><a href="#">Another link</a></li>
					<li><a href="#">A third link</a></li>
					<li><a href="#">Fourth link</a></li>
                    
				</ul>
				<div style="background-color:#FFF"><p>Debit ( <?php echo $debit; ?> ) - Credit ( <?php echo $Cre ?> )<br/>
                    	Baki dalam <br /> akaun syarikat = <?php echo $deb ?>
                        <br/>Balance = <?php echo $balance ?></p></div>
			</div> <!-- end side-menu -->
			

<!---------------------------------------------------setting transfer limit----------------------------------------->           
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"><b>setting transfer limit</b></h3>
					
					</div> <!-- end content-module-heading -->
                    <br/>
		<fieldset>
	<div align="center">
	<form action='' method='post'>
	
	<p>
	<label><b>Limit Per Month</b></label>
	<input id='simple-input' class='round default-width-input' type='text' type='text' name='Month' value="<?php echo $oldLimitMonth ?>">
	</p>
	
	<p>
	<label><b>Limit Per Week</b></label>
	<input id='simple-input' class='round default-width-input' type='text' type='text' name='Week' value="<?php echo $oldLimitWeek ?>">
	</p>
	
	<p>
	<label><b>Limit Per Day</b></label>
	<input id='simple-input' class='round default-width-input'  type='text' name='Day' value="<?php echo $oldLimitDay ?>">";
	</p>
	
	<input type='submit' value='update' name='update' class='round blue ic-right-arrow' />
	</form>
	</div><!-- end half-size-column -->
	</fieldset>			
	<br/><br/><br/>				
				

<!-------------limit per second ------------------------------------------------------------------------->

<?php
$code='1';
$tukar = $_POST['tukar'];
$sqltukar = "SELECT * FROM setting WHERE id ='".$code."'";
$querytukar = mysql_query($sqltukar);
while($LPS=mysql_fetch_array($querytukar)){
	$old = $LPS['quota']; 
	
}
if ($tukar){
	$new=$_POST['tetap'];
	mysql_query("update setting set quota='".$new."' where id='".$code."'");
	$_SESSION['auth']=true;
	header ("Location: setting.php");
	exit();
}

?>

					<div class="content-module-heading cf">
					
						<h3 class="fl"><b>setting limit transfer per second</b></h3>
					
					</div> <!-- end content-module-heading -->
                    <br/>
		<fieldset>
        <div align="center">
	<form action='' method='post'>
	
	
	<p>
	<label><b>limit persecond</b></label>
	<input id='simple-input' class='round default-width-input' type='text' name="tetap" value="<?php echo $old ?>">
	</p>
	
	
	
	<input type='submit' value='update' name="tukar" class='round blue ic-right-arrow' />
	</form>
    </div><!-- end half-size-column -->
	</fieldset>			
	<br/><br/><br/>
						
 <!------------------------------------setting account balance------------------------------------------->
<?php

$set = '1';
$ubah = $_POST['ubah'];
$SQL = "SELECT * FROM setting WHERE id ='".$set."'";
$QUERY = mysql_query($SQL);
while($Ub=mysql_fetch_array($QUERY)){
	$oldBaki = $Ub['Baki'];
	
	
}
if ($ubah){
	$newBaki = $_POST['Baki'];
	
	mysql_query("update setting set Baki='" .$newBaki. "' WHERE id='".$set."' ");
	$_SESSION['auth']=true;
	header ("Location: setting.php");
	exit();
}

?>

					<div class="content-module-heading cf">
					
						<h3 class="fl"><b>setting account balance</b></h3>
					
					</div> <!-- end content-module-heading -->
                    <br/>
		<fieldset>
        <div align="center">
	<form action='' method='post'>
	
	
	<p>
	<label><b>Akaun bulan ini</b></label>
	<input id='simple-input' class='round default-width-input' type='text' name="Baki" value="<?php echo $oldBaki ?>">
	</p>
	
	
	
	<input type='submit' value='update' name="ubah" class='round blue ic-right-arrow' />
	</form>
    </div><!-- end half-size-column -->
	</fieldset>			
	<br/><br/><br/>	
			
 <!--------------------------------------------setting jenis bank------------------------------------------------>
<?php
$value=$_POST['value'];
$submit=$_POST['send'];


if($submit){
	$sql="INSERT INTO jenis_bank (jenis_bank) VALUES ('$value')";
	$retval = mysql_query($sql, $conn);
						if ($retval)
						{
						echo "<b>SUCCESS!!!</b>";
							$_SESSION['auth']=true;
							header ("Location: setting.php");
							exit();
						}
}

?>


					<div class="content-module-heading cf">
					
						<h3 class="fl"><b>setting up type of bank for user make a transfer</b></h3>
					
					</div> <!-- end content-module-heading -->
                    <br/>
		<fieldset>
        <div align="center">
	<form action='' method='post'>
	
	
	<p>
	<label><b>Tambah jenis Bank</b></label>
	<input id='simple-input' class='round default-width-input' type='text' type='text' name="value">
	</p>
	
	
	
	<input type='submit' name="send" value="Tambah" class='round blue ic-right-arrow' />
	</form>
    </div><!-- end half-size-column -->
	</fieldset>			
	<br/><br/><br/>	
    
    
    <table>

<table>
<tr>
<td><b>no</b></td>
<td><b>Jenis Bank</b></td>
<td colspan="2"><b>action</b></td>
</tr>
<?php
$i = 1;
$SQL = "SELECT * FROM jenis_bank";
$QUERY = mysql_query($SQL);
	while($row=mysql_fetch_array($QUERY)){
		$type=$row['id'];
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['jenis_bank']."</td>";
		echo'<td><a href="setting.php?id='.$type.'">Edit</a></td>';
		echo'<td><a href="delete(jenis bank).php?id='.$type.'">Padam</a></td>';
		echo "</tr>";
		$i++;
	}

?>
</table>
<?php

	$edit = $_POST['edit'];
	if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sqlGET=mysql_query("SELECT * FROM jenis_bank WHERE id ='" .$id. "'");
	while($row=mysql_fetch_array($sqlGET)){
	$oldValue = $row['jenis_bank'];
	echo "<form action='' method='post'>";
	echo "<table>";
	echo "<tr>";
	echo "<td><b>Tukar Jenis Bank</b></td>";
	echo "<td>:</td>";
	echo "<td><input type='text' name='newValue' value='".$oldValue."'></td>";
	echo "<td><input type='submit' name='edit' value='Siap'</td>";
	echo "</tr>";
	echo "</table>";
		}
	}
	if ($edit){
	$newValue = $_POST['newValue'];
	
	mysql_query("update jenis_bank set jenis_bank='" .$newValue. "' where id='" .$id. "'");
	
	$_SESSION['auth']=true;
	header ("Location: setting.php");
	exit();
}

?>

</table>
			
</div></div>
<!-------------------------------------------php untuk edit staf------------------------------------>               
                        
					


		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2015 <a href="#">Tuffah Informatic, @</a>. All rights reserved.</p>
		<p><strong>Account System</strong> theme by <a href="http://www.buzzlee199@yahoo.com">buzzlee199@yahoo.com</a></p>
	
	</div> <!-- end footer -->

</body>
</html>