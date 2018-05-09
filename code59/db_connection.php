<?php
$host = "fdb21.awardspace.net";
$username = "2699804_spubookfinder";
$user_pass = "random1234";
$database_in_use = "2699804_spubookfinder";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

/*
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
*/
?>