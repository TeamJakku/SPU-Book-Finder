<?php
/*
$host = "spubookfinder.dx.am";
$username = "2699804";
$user_pass = "random1234";
$database_in_use = "2699804_spubookfinder";


$mysqli = new mysqli($host, $username,$user_pass,$database_in_use);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else {
  echo $mysqli->host_info . "\n";
}
*/
session_start();

include "db_connection.php";

include "login.php"

?>

<html>
<head>
	<title>SPU Book Finder</title>
</head>

<body>
</body>
</html>
