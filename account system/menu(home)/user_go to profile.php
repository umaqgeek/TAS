<?php

session_start();
session_destroy();
header ("Location: user_profile.php=1");
exit();	
?>

?>