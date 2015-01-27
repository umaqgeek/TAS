<?php
session_start();
error_reporting(0);
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
$jam = date("h/i/s A");

$me=$_SESSION['username'];
$p=$_SESSION['pass'];
$link=$_SESSION['id'];

?>

<?php
$L=mysql_query("SELECT * FROM setting");
while($fuhh=mysql_fetch_array($L)){
	$fuhh['MonthLimit'];
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
<title>Staff</title>

</head>

<body>
  


	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>Staff</strong></a>
					<ul>
						<li><a href="user_editProfile.php">My Profile</a></li>
						<li><a href="change pass.php">Change Password</a></li>
						<li><a href="../logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">Home</a></li>
                <li><a href="#" class="round button dark menu-email-special image-left">Account Transaction</a></li>
                <li><a href="../logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
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
<h3 style="color:white">Info transaction</h3>
<ul style='background:white'>
<?php

$acc = "SELECT Jamaun, COUNT(name), SUM(jumlah) FROM account WHERE name='".$me."' AND link_id='".$link."' GROUP BY Jamaun "; 
$res = mysql_query($acc) or die(mysql_error());

// Print out result from user amount transacation
while($row = mysql_fetch_array($res)){
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


$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Kredit' and name = '".$me."' AND link_id='".$link."'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$Cre =  $row['sum(jumlah)'];
}

$deb = $debit + $akaun;
$balance = $deb - $Cre;

//echo $deb ."-" .$Cre ."=". $balance;
echo "<li><p><b>Total balance from <br/> account = </b>".$deb." <br/> <b>Credit from you = </b>".$Cre."";
echo "<br/>Balance in company account ".$akaun;
echo "<br />Total Balance = ".$balance."</p></li>";



//limit for user transaction (per/month)
$limit = "SELECT month, SUM(quantity) FROM users WHERE username ='".$me."' AND id='".$link."'";
$M = mysql_query($limit);
while ($month = mysql_fetch_array($M)){
	$monthQuantity = $month['SUM(quantity)'];
	if ($monthQuantity == 0){
		echo "<li><p style='color:red'>You have a limit transaction for this week.Sila cuba lagi dibulan hadapan</p>";
	}else{
		echo "<br/><p>your limit of debit for this month is " .$monthQuantity."</p>";
	}
}

//limit for user transaction (per/week)
$Wlimit = "SELECT week, SUM(weekQuantity) FROM users WHERE username ='".$me."' AND id='".$link."'";
$W = mysql_query($Wlimit);
while ($week = mysql_fetch_array($W)){
	$weekQuantity = $week['SUM(weekQuantity)'];
	if ($weekQuantity == 0){
		echo "<br/><p style='color:red'>You have a limit transaction for this week..cuba lagi minggu depan</p>";
	}else{
	echo "<p>your limit of debit for this week is " .$weekQuantity ."</p>";
	}
}

//limit for user transaction (per/day)
$Dlimit = "SELECT day, SUM(dayQuantity) FROM users WHERE username ='".$me."' AND id='".$link."'";
$D = mysql_query($Dlimit);
while ($day = mysql_fetch_array($D)){
	$dayQuantity = $day['SUM(dayQuantity)'];
	if ($dayQuantity == 0){
		echo "<br/><p style='color:red'>You have a limit transaction for today.Please try again tomorrow</p>";
	}else{
	echo "<br/><li><p>your limit of debit for today is " .$dayQuantity. "</p></li>";
	}
}
?>
</ul></div><!--side-menu fl-->

<!----------------------------------------------------user account----------------------------------------->           
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Table Account(new)</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">					
						<table>
						
							<thead>
					
	
								<tr>
									<th>no</th>
                                    <th>status</th>
									<th>staff name</th>
									<th>Jenis amaun</th>
									<th>Jenis bank</th>
                                    <th>perkara</th>
                                    <th>jumlah</th>
                                    <th>tarikh</th>
                                    <th>masa</th>
                                    <th colspan="2">Action</th>
								</tr>
							
<?php

session_start();
 $i=1;
$result = mysql_query("SELECT * FROM account WHERE name='" .$me. "' AND link_id='" .$link. "' AND semak='Baru'");
while($rows=mysql_fetch_array($result))
{
	$user=$rows['id'];
		
		
	echo'<tr>';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center"><h3><b>'.$rows['semak'].'</b><h3></td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';
	
	echo'<td><a href="User_CheckTransaction.php?id='.$user.'">Edit</a></td>';
	echo'<td><a href="user_delete_transaction.php?id='.$user.'">Delete</a></td>';
	echo'</tr>';

	$i++;

}


?>




 							</thead>

					</table>
               </div> <!-- end content-module-main -->
               
               
               
               
               
<!---edit--->	
 <?php

$update = $_POST['update'];
if(isset($_GET['id'])){
	$id= $_GET['id'];
	$sqlGET=mysql_query("SELECT * FROM account WHERE id ='" .$id. "'");
	while($row=mysql_fetch_array($sqlGET)){


	$oldname = $row['name']; 
	$oldJamaun = $row['Jamaun'];
	$oldJbank = $row['Jbank'];
	$oldjumlah = $row['jumlah'];
	$oldperkara = $row['perkara'];
	$oldtarikh = $row['tarikh'];
	$oldmasa = $row['masa'];
	$id = $row['id'];
	
echo "<div class='content-module'>";
				
				echo"<div class='content-module-heading cf'>";
					
					echo "<h3 class='fl'>Edit detail</h3>";
					echo "<span class='fr expand-collapse-text'>Click to collapse</span>";
					echo "<span class='fr expand-collapse-text initial-expand'>Click to expand</span>";
					
				echo "</div> <!-- end content-module-heading -->";
echo "</div>";

	echo "<fieldset>";
	echo "<form action='' method='post'>";
	echo "<div class='half-size-column fl'>";


	echo "<p>";
	echo "<label><b>staff name</b></label>";
	echo $oldname;
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Amount Type</b></label>";
	echo "<select name='Jamaun' id='select'>";
	echo "<option>".$oldJamaun."</option>";
	echo "<option>Debit</option>";
	echo "<option>Kredit</option>";
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Amount</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='jumlah' value='".$oldjumlah."'>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Description</b></label>";
	echo "<input id='simple-input' class='round default-width-input' type='text' type='text' name='perkara' value='".$oldperkara."'>";
	echo "</p>";
	
	echo "</div>";
	echo "<div class='half-size-column fr'>";
	
	
	echo "<p class='form-error>";
	echo "<label for='dropdown-input-actions'><b>Type of Bank</b></label>";
	echo "<select name='Jbank' id='select'>";
	echo "<option>".$oldJbank."</option>"; ?>
    <?php
			$callJbank=mysql_query("SELECT * FROM jenis_bank");
			while($call=mysql_fetch_array($callJbank)){
	?>
    <?php
	echo "<option value='".$call['jenis_bank']."'>".$call['jenis_bank']."</option>";
			}
	echo "</select>";
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Date</b></label>";
	echo $oldtarikh;
	echo "</p>";
	
	echo "<p>";
	echo "<label><b>Time</b></label>";
	echo $oldmasa;
	echo "</p>";
	
	echo "<input type='submit' value='update' name='update' class='round blue ic-right-arrow' />";

	echo "</div>";//-- end half-size-column -->
	echo "</form>";
	echo "</fieldset>";
		}
	}
if ($update){
	$newUsername = $_POST['name'];
	$newJamaun = $_POST['Jamaun'];
	$newJbank = $_POST['Jbank'];
	$newjumlah = $_POST['jumlah'];
	$newperkara = $_POST['perkara'];
	$newtarikh = $_POST['tarikh'];
	$newmasa = $_POST['masa'];
	
	mysql_query("update account set Jamaun='".$newJamaun."', Jbank='".$newJbank."', jumlah='".$newjumlah."', perkara='".$newperkara."' where id='".$id."'");
	

	$_SESSION['auth']=true;
	header ("Location: User_CheckTransaction.php");
	exit();
}

?>   
    
    

			</div> <!-- end content-module -->    			
 <!--------------------------------------------php dh disemak dari user------------------------------------------->

<div class='content-module'>
				
				<div class='content-module-heading cf'>
					
					<h3 class='fl'>Table Account(old)</h3>
					<span class='fr expand-collapse-text'>Click to collapse</span>
					<span class='fr expand-collapse-text initial-expand'>Click to expand</span>
					
				</div> <!-- end content-module-heading -->
					
					<div class='content-module-main'>
					<table>
						<thead>

						
							<tr>
								<th>no</th>
                                <th>status</th>
								<th>staff name</th>
								<th>Jenis amaun</th>
								<th>Jenis bank</th>
                                <th>perkara</th>
                                <th>jumlah</th>
                                <th>tarikh</th>
                                <th>masa</th>
							</tr>
						
 <!--------------------------------------------php tgk user dh disemak form------------------------------------------------>
<?php
session_start();
$result=mysql_query("select * from account where semak='Disemak'");
$i = 1;

while($rows=mysql_fetch_array($result))
{
	$user=$rows['id'];
		
		
	echo'<tr align="center">';
	echo'<td width="100" align="center">'.$i.'</td>';
	echo'<td width="100" align="center">'.$rows['semak'].'</td>';
	echo'<td width="100" align="center">'.$rows['name'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jamaun'].'</td>';
	echo'<td width="100" align="center">'.$rows['Jbank'].'</td>';
	echo'<td width="100" align="center">'.$rows['perkara'].'</td>';
	echo'<td width="100" align="center">'.$rows['jumlah'].'</td>';
	echo'<td width="100" align="center">'.$rows['tarikh'].'</td>';
	echo'<td width="100" align="center">'.$rows['masa'].'</td>';

	echo'</tr>';
	
	$i++;
}
?>
 							</thead>

					</table>
               </div> <!-- end content-module-main -->
				
			</div> <!-- end content-module -->

<!-------------------------------------------php untuk edit staf------------------------------------>               
                        
<?php

$name=$_POST['name'];
$Jbank=$_POST['Jbank'];
$date = $_POST['tarikh'];
$time = $_POST['masa'];
$perkara=$_POST['perkara'];
$Jbayaran=$_POST['Jamaun'];
$jumlah=$_POST['jumlah'];
$submit=$_POST['send'];
if($submit)
{
	if ($name && $Jbank && $perkara && $Jbayaran && $date && $time && $jumlah)
	{
		if($_POST["name"] != $me)
		{
			echo "Sorry, sender must be own of this account\n\n";
			$_SESSION['auth']=true;
			header ("Location: User_confirm 1st.php?msg=0");
			exit();
		}
		
		else if($jumlah > $akaun){
			$_SESSION['auth']=true;
			header ("Location: User_CheckTransaction.php?msg=6");
			exit();
		}
		else if($_POST['Jamaun'] == "Debit" && $monthQuantity < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: User_CheckTransaction.php?msg=1");
			exit();
		}else if($_POST['Jamaun'] == "Debit" && $weekQuantity < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: CheckTransaction.php?msg=2");
			exit();
		}else if($_POST['Jamaun'] == "Debit" && $dayQuantity < $jumlah){
			echo "Sorry lah derrr dah limit..";
			$_SESSION['auth']=true;
			header ("Location: User_CheckTransaction.php?msg=3");
			exit();
		}
		
		else if($_POST['Jamaun'] == "Kredit" && $jumlah > $balance){
			echo "Sorry lah derrr baki account tidak mencukupi untuk buat pengeluaran..";
			$_SESSION['auth']=true;
			header ("Location: User_CheckTransaction.php?msg=4");
			exit();
		}
		else{
				$sql = "INSERT INTO account (name, Jamaun, jumlah, perkara, tarikh, masa, Jbank, link_id)
				VALUES('$name','$Jbayaran','$jumlah','$perkara','$date','$time','$Jbank','$link')";
				
				mysql_select_db('sistem_akaun');
				$retval =  mysql_query($sql, $conn);
				if ($retval)
				{
					if($_POST['Jamaun'] == "Debit"){
						if($quan && $QuanWeek && $Quanday >= $jumlah){
							$new = $quan - $_POST['jumlah'];
							$sequal = "UPDATE users SET quantity = '".$new."' WHERE username = '".$me."' AND pass = '".$p."' AND id = '".$link."'";
							$sets =  mysql_query ($sequal);
							
							$newWeek = $QuanWeek - $_POST['jumlah'];
							$Sequalweek = "UPDATE users SET weekQuantity = '".$newWeek."' WHERE username = '".$me."' AND pass = '".$p."' AND id = '".$link."'";
							$SetWeek = mysql_query ($Sequalweek);
							
							$newday = $Quanday - $_POST['jumlah'];
							$Sequalday = "UPDATE users SET dayQuantity = '".$newday."' WHERE username = '".$me."' AND pass = '".$p."' AND id = '".$link."'";
							$SetDay = mysql_query ($Sequalday);
							
							
							$_SESSION['auth']=true;
							header ("Location: User_CheckTransaction.php?msg=7");
							exit();
						}
					 	else{
							$_SESSION['auth']=true;
							header ("Location: User_CheckTransaction.php?msg=7");
							exit();
						}
					}else{
						$_SESSION['auth']=true;
						header ("Location: User_CheckTransaction.php?msg=7");
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
			header ("Location: User_CheckTransaction.php?msg=5");
			exit();
	}
}
?>
<div class="side-content fr">
			
	<div class="content-module">


<fieldset>
	<form action='' method='post'>
    
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
	echo "<span style='color:red;'>Sorry lah derrr setiap transaksi hanya boleh dibuat kurang dari RM ".$akaun." sekali</span>";
	if($message == 7)
	echo "<span style='color:green;'>Congrates!!!</span>";
}
?>
    
	<div class='half-size-column fl'>


	<p>
	<label><b>staff name</b></label>
	<input type="text" value="<?php echo $me ?>" name="name" />
	</p>
	
	<p>
	<label><b>Amount Type</b></label>
	<select name='Jamaun' id='select'>
	<option></option>
	<option>Debit</option>
	<option>Kredit</option>
	</select>
	</p>
	
	<p>
	<label><b>Amount (RM)</b></label>
	<input id='simple-input' class='round default-width-input' type='text' type='text' name='jumlah'>
	</p>
	
	<p>
	<label><b>Description</b></label>
	<input id='simple-input' class='round default-width-input' type='text' type='text' name='perkara'>	
    </p>
	
	</div><!--half-size-column fl-->
	<div class="half-size-column fr">
	
	
	<p class='form-error'>
	<label for='dropdown-input-actions'><b>Type of Bank</b></label>
	<select name="Jbank" id="select">
	<option><?php echo $_POST['Jbank'] ?></option>
	<?php 
	$callJbank=mysql_query("SELECT * FROM jenis_bank");
	while($call=mysql_fetch_array($callJbank)){
	?>
	<option value="<?php echo $call['jenis_bank'] ?>"><?php echo $call['jenis_bank'] ?></option>
	<?php }?>
	</select>
	</p>
	
	<p>
	<label><b>Date</b></label>
	<input name="tarikh" value="<?php echo $tarikh ?>" />
	</p>
	
	<p>
	<label><b>Time</b></label>
	<input name="masa" value="<?php echo $jam ?>"  />
	</p>
	
	<input type='submit' value='send' name='send' class='round blue ic-right-arrow' />

	</div><!-- end half-size-column -->
	</form>
	</fieldset>








</div></div>



	</div><!---content-module--->
</div><!---side-content fr-->
					


		
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
</body>
</html>

</body>
</html>
</body>
</html>





