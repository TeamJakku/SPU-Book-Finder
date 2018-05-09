<?php
	$host = "fdb21.awardspace.net";
	$username = "2699804_spubookfinder";
	$user_pass = "random1234";
	$database_in_use = "2699804_spubookfinder";

	$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);


	
	if(isset($_POST['register'])){
		
		
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
		
		$password = md5($password);
		$password_confirm = md5($password_confirm);
		
		$hash = md5(rand(0,1000));

		$sql_store = "INSERT into users(username, password, email, hash) VALUES('$username','$password','$email','$hash')";
		$sql_fetch_username = "SELECT username FROM users WHERE username ='$username'";
		$sql_fetch_email = "SELECT email FROM users WHERE email ='$email'";
		
		$query_username = $mysqli->query( $sql_fetch_username);
		$query_email = $mysqli->query($sql_fetch_email);
	
	
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
			
			
			

			$msg = 'Your account has been made, <br/> please verify it by clicking the activation link that has been send to your email.';
		
 			
 			$verificationPassword = htmlspecialchars($_POST['password']);
 			if(!isset($verificationPassword)){echo "pass not set";}else{echo $verificationPassword;}
			$to = htmlspecialchars($_POST['email']); 
			if(!isset($to)){echo "to not set";}else{echo $to;}

			$subject = 'Signup | Verification'; // Give the email a subject 
			$message = '
			
			Thanks for signing up!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			 
			------------------------
			Username: '.$_POST['username'].'
			Password: '.$verificationPassword.'
			------------------------
			 
			Please click this link to activate your account:
			http://http://spubookfinder.dx.am/verify.php?email='.$email.'&hash='.$hash.'
			 
			'; // Our message above including the link
			         

			 if(!isset($message)){echo "message not set";}else{echo $message;}
            
			$headers = 'From:message@spubookfinder.dx.am' . "\r\n"; // Set from headers
			if (mail($to, $subject, $message, $headers)){
					echo 'success';

			}
			else {
			error_reporting(-1);
			ini_set('display_errors', 'On');
			set_error_handler("var_dump");
			echo "Failed";
			echo 'failed to email';} // Send our email

//$mysqli->query($sql_store);

	}
	else{
		echo "post is not set";
	}

	$query_username->close();
	$query_email->close();
	$mysqli->close();

?>

