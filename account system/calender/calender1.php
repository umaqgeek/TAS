<?php


// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('GMT');


// Prints something like: Monday
echo date("l");

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo "<br/>". date('jS F Y ');
echo "<br/>" .date('h:i:s A');

?>

<?php

echo date('Y', strtotime('0000-00-00 00:00:00'));

/*
PHP 5.3.3
returns: -0001

PHP 5.2.10
returns: 1970
*/

?>