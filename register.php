<?php
	include_once("db.php");
	if(isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	if(isset($_POST['register'])){
		
		
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$password_confirm = strip_tags($_POST['password_confirm']);
		$email = strip_tags($_POST['email']);
		
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		$password_confirm = stripslashes($password_confirm);
		$email = stripslashes($email);
		
		
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);
		$password_confirm = mysqli_real_escape_string($db, $password_confirm);
		$email = mysqli_real_escape_string($db, $email);
		
		$password = md5($password);
		$password_confirm = md5($password_confirm);
		
		$sql_store = "INSERT into users(username, password, email) VALUES('$username','$password','$email')";
		$sql_fetch_username = "SELECT username FROM users WHERE username ='$username'";
		$sql_fetch_email = "SELECT email FROM users WHERE email ='$email'";
		
		$query_username = mysqli_query($db, $sql_fetch_username);
		$query_email = mysqli_query($db, $sql_fetch_email);
	
		$allowed = array('spu.edu');
		
			if(mysqli_num_rows($query_username)){
				echo "There is a username  with that name";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			if($username == ""){
				echo "Please enter a username";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			
			if($password == "" || $password_confirm == ""){
				echo "Please insert you password";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			
			if($password != $password_confirm){
				echo "Passwords do not match!";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
				return;
			}
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == ""){
				echo "Email is not valid";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='login.php'>Return to Signup page</a>";
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
			
			
			mysqli_query($db, $sql_store);
			//header("Location: index.php");
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
					echo 'success';
					$mysqli->query($sql_store);

			}
			else {
			error_reporting(-1);
			ini_set('display_errors', 'On');
			set_error_handler("var_dump");
			echo "Failed";

			} 
	}
	
	
	
?>

