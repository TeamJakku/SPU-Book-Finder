<?php 
$host = "fdb21.awardspace.net";
$username = "2699804_spubookfinder";
$user_pass = "random1234";
$database_in_use = "2699804_spubookfinder";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

 
$from = $_POST['from'];


$to_user = $_POST['to'];
$sql = "SELECT email  FROM USER WHERE username LIKE '%". $to_user ."%'";
$result = $mysqli->query($sql);
if(mysqli_num_rows($result) > 0 ){
	$row = mysqli_fetch_row($result); 
	$to = $row[0]; 
}

$subject = "Private Message From User " . $_POST['from'] . " :";
$subject .= $_POST['subject'];
$message = "Hi! User " . $_POST['from'] . "messaged you from SPU Book Finder: <br>" . PHP_EOL;
$message .= $_POST['message'];



$body = $message;



$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= 'To: ' . $to . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $body,$headers)){
	echo " Message Sent!";
	echo"<a href= 'index.php'> Click here to go back to Main Page</a>";
}else{
	error_reporting(-1);
	ini_set('display_errors', 'On');
	set_error_handler("var_dump");
	echo "Failed";
}




$result->close();
$mysqli->close();
?>