<?php
session_start();
error_reporting(0);
require("connect_manageUser.php");

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
						<li><a href="Admin Manage User/setting.php">Settings</a></li>
						<li><a href="Admin Manage User/change password.php">Change Password</a></li>
						<li><a href="../logout.php">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">Home</a></li>
                <li><a href="Admin Account.php" class="round button dark menu-email-special image-left">Account Report</a></li>
				<li><a href="Admin Manage User/register.php" class="round button dark menu-email-special image-left">Staff Table</a></li>
                <li><a href="../logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					


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
			<a href="#" id="company-branding-small" class="fr"><img src="tuffahlogo.png" alt="Tuffah Informatic" /></a>
			
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

$deb = $debit + $akaun;


$sqlSub = "SELECT Jamaun, sum(jumlah) FROM account WHERE Jamaun = 'Kredit'";
$resSub = mysql_query($sqlSub) or die(mysql_error());
while ($row = mysql_fetch_array($resSub)){
	$Cre =  $row['sum(jumlah)'];
}

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
                    	Baki dalam <br /> akaun syarikat = <?php echo ($akaun + $debit - $Cre) ?></p></div>
			</div> <!-- end side-menu -->
			
            
            
            
            
            
            

<!----------------------------------------------------user account----------------------------------------->           
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Table Account(new)</h3>
					
					</div> <!-- end content-module-heading -->
					
					
					
						<table>
						
							<thead>
					
					<div class="content-module-main">	
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
$result=mysql_query("select * from account where semak='Baru'");
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

	echo'<td><a href="delete_report.php?id='.$user.'">Delete</a></td>';
	echo'<td align="right"><a href="connect_semak.php?semak='.$user.'">Semak</a></td>';
	echo'</tr>';
	
	$i++;
}


?>

			</div> <!-- end content-module -->
 							</thead>

					</table>
               </div> <!-- end content-module-main -->
				
 <!--------------------------------------------php dah disemak dari user------------------------------------------->

<?php
$disemak=mysql_query("select * from account where semak='Disemak'");
if ($disemak){		
			echo "<div class='content-module'>";
				
				echo "<div class='content-module-heading cf'>";
					
					echo "<h3 class='fl'>Table Account(old)</h3>";
					
				echo "</div> <!-- end content-module-heading -->";
					echo "<table>";
						echo "<thead>";
					
					echo "<div class='content-module-main'>";

						
							echo "<tr>";
								echo "<th>no</th>";
                                echo "<th>status</th>";
								echo "<th>staff name</th>";
								echo "<th>Jenis amaun</th>";
								echo "<th>Jenis bank</th>";
                                echo "<th>perkara</th>";
                                echo "<th>jumlah</th>";
                                echo "<th>tarikh</th>";
                                echo "<th>masa</th>";
                                echo "<th>Action</th>";
							echo "</tr>";
}
?>							
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

	echo'<td><a href="delete_report.php?id='.$user.'">Delete</a></td>';
	echo'</tr>';
	
	$i++;
}

 							echo "</thead>";

					echo "</table>";
               echo "</div> <!-- end content-module-main -->";
				
			echo "</div> <!-- end content-module -->";
?>
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
</body>
</html>