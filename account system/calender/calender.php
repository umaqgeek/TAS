<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calender</title>
</head>

<body>

<?php
$date = time();

$day = date('d', $date);
$month = date('m', $date);
$year = date('y', $date);

$first_day = mktime(0,0,0,$month, 1, $year);

$title = date('F', $first_day);

$day_of_week = date('D', $first_day);

switch($day_of_week)
{
	case "Sun": $blank = 0; break;
	case "Mon": $blank = 1; break;
	case "Tue": $blank = 2; break;
	case "Wed": $blank = 3; break;
	case "Thu": $blank = 4; break;
	case "Fri": $blank = 5; break;
	case "Sat": $blank = 6; break;
}


$days_in_month = cal_days_in_month(0, $month, $year);


echo "<table border=6 width=394>";
echo "<tr><th colspan=60> $title $year </th></tr>";
echo "<tr><td width=62>Sun</td><td width=62>Mon</td><td width=62>Tue</td><td width=62>Wed</td><td width=62>Thu</td><td width=62>Fri</td><td width=62>Sat</td>";


$day_count = 1;

echo "<tr>";


while ( $blank > 0 )
{
	echo "<td></td>";
	$blank = $blank-1;
	$day_count++;
}


$day_num = 1;


while ( $day_num <= $days_in_month)
{
	echo "<td> $day_num </td>";
	$day_num++;
	$day_count++;
	
	if($day_count > 7)
	{
		echo "</tr><tr>";
		$day_count = 1;
	}
}


while ($day_count > 1 && $day_count <= 7)
{
	echo "<td></td>";
	$day_count++;
}

echo "</tr></table>";




if(isset($_GET['day'])){
	$day = $_GET['day'];
}else{
	$day = date("j");
}


if(isset($_GET['month'])){
	$month = $_GET['month'];
}else{
	$month = date("n");
}


if(isset($_GET['year'])){
	$year = $_GET['year'];
}else{
	$year = date("Y");
}



$day = date("j");
$month = date("n");
$year = date("Y");

//calender variable
$currentTimeStamp = strtotime("$year-$month-$day");
$monthName = date("F", $currentTimeStamp);
$numDays = date("t", $currentTimeStamp);
$counter = 0;
?>


<table border="1">

<tr>
<td><input style="width:50px;" type="button" value="<" name='previousbutton'></td>
<td colspan="5"> <?php echo $monthName.", ".$year; ?> </td>
<td><input style="width:50px;" type="button" value=">" name='nextbutton'></td>
</tr>

<tr>
<td width="50px">Sun</td>
<td width="50px">Mon</td>
<td width="50px">Tue</td>
<td width="50px">Wed</td>
<td width="50px">Thu</td>
<td width="50px">Fri</td>
<td width="50px">Sat</td>
</tr>
</table>






<?php
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set("Asia/Kuala_Lumpur");


// Prints something like: Monday
echo date("l");

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');

// Prints: July 1, 2000 is on a Saturday
echo "<br/>July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

/* use the constants in the format parameter */
// prints something like: Wed, 25 Sep 2013 15:28:57 -0700
echo date(DATE_RFC2822);

// prints something like: 2000-07-01T00:00:00+00:00
echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));


$now = date ('d');
echo "<br/>";
echo $now .date('l')."<br/>";

//huruf besar utk format 24 jam,huruf kecik utk format 12jam(h/H)

?>
</body>
</html>