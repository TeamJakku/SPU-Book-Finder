<?php
	$host = "pdb25.awardspace.net";
	$username = "2699804_spubookfinder";
	$user_pass = "random1234";
	$database_in_use = "2699804_spubookfinder";

	$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

	if(isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	if(isset($_POST['register'])){
		
		$email = $_POST['email'];

		


		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$password_confirm = strip_tags($_POST['password_confirm']);
		$email = strip_tags($_POST['email']);
		
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		$password_confirm = stripslashes($password_confirm);
		$email = stripslashes($email);
		
		
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		$password_confirm = mysqli_real_escape_string($mysqli, $password_confirm);
		$email = mysqli_real_escape_string($mysqli, $email);
		
		$allowed = array('spu.edu');

		$password = md5($password);
		$password_confirm = md5($password_confirm);
		
		$hash = md5(rand(0,1000));

		$sql_store = "INSERT into users(username, password, email, hash) VALUES('$username','$password','$email','$hash')";
		$sql_fetch_username = "SELECT username FROM users WHERE username ='$username'";
		$sql_fetch_email = "SELECT email FROM users WHERE email ='$email'";
		
		$query_username = $mysqli->query( $sql_fetch_username);
		$query_email = $mysqli->query($sql_fetch_email);
	
	
	


	}
	



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



<span style="font-size:30px; background-color: #7F1335; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776;</span>
<br>
<br>
<br>
<legend style = "background-color: #7F1335; color: #FFF2CC;"></legend>
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

			if(mysqli_num_rows($query_username)){
				echo "There is a username  with that name";
				return;
			}
			if($username == ""){
				echo "Please enter a username";
				return;
			}
			
			if($password == "" || $password_confirm == ""){
				echo "Please insert you password";
				return;
			}
			
			if($password != $password_confirm){
				echo "Passwords do not match!";
				return;
			}
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == ""){
				echo "Email is not valid";
				return;
			}
			
			if(mysqli_num_rows($query_email)){
				echo "That email is already in use";
				return;
			}
			
			$explodedEmail = explode('@', $email);
			$domain = array_pop($explodedEmail);

			if ( ! in_array($domain, $allowed))
			{
				echo "Please enter an SPU email";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			
			if(mysqli_num_rows($query_email)){
				echo "That email is already in use";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			
			

			$msg = 'Your account has been made, <br/> please verify it by clicking the activation link that has been send to your email.';
		
 			
 			$verificationPassword = $_POST['password'];
 			
			$to = $_POST['email']; 
		
			$subject = 'Signup | Verification'; // Give the email a subject 
			$message= '
			
			Thanks for signing up!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			 
			------------------------
			Username: '.$_POST['username'].'
			Password: '.$verificationPassword.'
			------------------------
			 
			Please click this link to activate your account:
			http://spubookfinder.dx.am/verify.php?email='.$email.'&hash='.$hash.'
			 
			'; // Our message above including the link
			         
            
			$headers = 'From:message@spubookfinder.dx.am' . "\r\n"; // Set from headers

		

		


if (mail($to, $subject, $message, $headers)){
					echo '<label>Thank you for signing up. A Confirmation link has been sent to your email. Please click the link to complete your registration.<p>Click <a href="login.php">here</a> to go back to login page</p></label>';
					$mysqli->query($sql_store);

			}
			else {
			error_reporting(-1);
			ini_set('display_errors', 'On');
			set_error_handler("var_dump");
			echo "Failed to email";

			} 


	$query_username->close();
	$query_email->close();
	$mysqli->close();

?>    
</div>
<!--end of message form-->
</div>
</body>
</html>




