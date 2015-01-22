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



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/susun_menu.css">
<link rel="stylesheet" href="../css/lay_menu.css">
</head>
<body bgcolor="#CCCCCC">

<img src="../tuffahlogo.png" />



<div id="container">

<div id="Header"><h1><b>Tuffah Account Management System</b></h1>
</div>

<div id="Nav">

<nav>
<ul>
<li><a href="../Admin Account.php">Home</a></li>
<li><a href="../index_register.php">User Registration</a></li>
<li><a href="../register.php">User Account</a></li>
<li><a href="../Admin_home.php">Report</a></li>
<li><a href="setting.php">Setting</a></li>
<li><a href="logout.php">Logout</a></li></ul>
</nav>
</div><!--Nav-->





</div><!--container-->
<br/><br/><br/><br/>


<table>
<tr>


<hr/>
<form action="" method="POST" class="table">
<table>
<h3><b>tetapan limit transfer</b></h3>
<tr>
<td>Limit Per Month</td>
<td>:</td>
<td>
<input type="text" name="Month" value="<?php echo $oldLimitMonth ?>" />
</td>
</tr>

<tr>
<td>Limit Per Week</td>
<td>:</td>
<td>
<input type="text" name="Week" value="<?php echo $oldLimitWeek ?>" />
</td>
</tr>

<tr>
<td>Limit Per Day</td>
<td>:</td>
<td>
<input type="text" name="Day" value="<?php echo $oldLimitDay ?>" />
</td>
</tr>

<tr>
<td colspan="2" align="left">
<input type="submit" name="update" value="Finish" />
</td>
<td>
<input type="reset" value="Reset" />
</td>
</tr>

</table>

</form>




</tr>
<tr>


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
<hr/>
<form action="" method="POST" class="table">
<table>
<h3><b>Akaun Syarikat</b></h3>
<tr>
<td>Akaun bulan ini</td>
<td>:</td>
<td>
<input type="text" name="Baki" value="<?php echo $oldBaki ?>" />
</td>
</tr>

<tr>
<td colspan="2" align="left">
<input type="submit" name="ubah" value="Finish" />
</td>
<td>
<input type="reset" value="Reset" />
</td>
</tr>

</table>

</form>


</tr>
<tr>

<hr/>
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
<form action="" method="post">
<table>
<h3><b>Tetapan Jenis Bank untuk user buat transaksi</b></h3>
<tr>
<td>Tambah jenis Bank</td>
<td>:</td>
<td><input type="text" name="value"></td>
</tr>

<tr>
<td align="left" colspan="3"><input type="submit" name="send" value="Tambah"></td>
</tr>
</table>
</form>


<table>

<table>
<tr>
<td><b>Jenis Bank</b></td>
<td></td>
<td></td>
</tr>
<?php

$SQL = "SELECT * FROM jenis_bank";
$QUERY = mysql_query($SQL);
	while($row=mysql_fetch_array($QUERY)){
		$type=$row['id'];
		echo "<tr>";
		echo "<td>".$row['jenis_bank']."</td>";
		echo'<td><a href="setting.php?id='.$type.'">Edit</a></td>';
		echo'<td><a href="delete(jenis bank).php?id='.$type.'">Padam</a></td>';
		echo "</tr>";
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


</tr>
</table>
</body>
</html>
