<?php

$mysql_server = 'localhost';
$mysql_username = 'root';
$mysql_password = 'rexyz@hth';
$mysql_database = 'sp';

// END DATABASE CONNECTION SETTINGS
// INCLUDE FUNCTION FILE - DO NOT EDIT BELOW THIS //
        
        // INCLUDE CLASSES
	include ('class/creativePager.php');
	
	// MYSQL DATABASE CONNECTION
	$conn = mysql_connect($mysql_server,$mysql_username,$mysql_password) or die(mysql_error());
        mysql_select_db($mysql_database, $conn) or die(mysql_error());
	
	include ("tableset.php");
	include ("function.php");
	
	$config["hash"] = "mI7hZx2IpQ9";	
	// CREATE LOGIN SESSIONS
	$config["logged_in"] = $_SESSION['logged_in'];
	$config["adminname"] = $_SESSION['adminname'];
	$config["adminemail"] = $_SESSION['aemail'];
	$config["last_log"] = $_SESSION['last_log'];
	
	// Session Timeout
	include ("sessionfunction.php");

// END

?>
