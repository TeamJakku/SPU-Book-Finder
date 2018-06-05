<?php 

session_start();
$session_username = $_SESSION["username"];

$host = "pdb25.awardspace.net";
$username = "2699804_spubookfinder";
$user_pass = "random1234";
$database_in_use = "2699804_spubookfinder";

$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

 
$from = $_POST['from'];


$to_user = $_POST['to'];
$sql = "SELECT email  FROM users WHERE username LIKE '%". $to_user ."%'";
$result = $mysqli->query($sql);

if(mysqli_num_rows($result) > 0 ){
	$row = mysqli_fetch_row($result); 
	$to = $row[0]; 
}



$subject = "Private Message From User " . $_POST['from'] . " :";
$subject .= $_POST['subject'];
$message = "Hi! User " . $_POST['from'] . " messaged you from SPU Book Finder: <br>" . PHP_EOL;
$message .= $_POST['message'];



$body = $message;



$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= 'To: ' . $to . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Message Page</title>
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style = "background-color:#EDD7B2;">

<div class="otherH">
<h1 style = "background-color: #7F1335;" class ="log">SPU Book Finder</h1>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php if($session_username == "administrator"){echo "<a href='index_administrator.php'>Search </a>";}
    else{
      echo "<a href='index_search.php'>Search</a>";
    } ?>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
  <a href="support.php">Support</a>
  <?php if($session_username == "administrator"){echo "<a href='add_course_form.php'>Add Courses </a>";} ?>
  <a href="logout.php">Log Out</a>
</div>

<span style="font-size:30px; background-color: #7F1335; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776;</span>
<br>
<br>
<br>
<legend style = "background-color: #7F1335; color: #FFF2CC;">Message</legend>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
} 
</script>

<!-- Form Name -->

 </head>
<body>
<div class="sechalf">


<!--the message form-->
<div id="main">
<?php  

if($from == $to_user){

  echo "<label>You can't send an email to yourself!</label>";

    echo  nl2br ("\n");
    echo  nl2br ("\n");
 if($session_username == "administrator"){
  
 echo "<label><a href='index_administrator.php'>Return to Search page</a></label>";}
    else{
      echo "<label><a href='index_search.php'>Return to Search page</a></label>";
    } 
	

	
	return;
}

if(mail($to, $subject, $body,$headers)){
	if($session_username == "administrator"){
      $url="index_administrator.php";
    }
    else{
      $url = "index_search.php";
    } 

    echo " Message Sent!";

    if($session_username == "administrator"){
      echo"<label><a href= 'index_administrator.php'>  Click here to go back to Main Page</a></label>";
    }
      else{
	echo"<label><a href= 'index_search.php'>  Click here to go back to Main Page</a></label>";}

	echo  nl2br ("\n");


  
    

    print "<meta HTTP-EQUIV=Refresh CONTENT=\"5; URL=$url\">";
    print "Will Redirect to Search Page in 5 seconds.";
    exit;



}else{
	error_reporting(-1);
	ini_set('display_errors', 'On');
	set_error_handler("var_dump");
	echo "<label>Failed to send the email.</label>";
}

$result->close();
$mysqli->close();
?>    
</div>
<!--end of message form-->
</div>
</body>
</html>

