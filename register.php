<?php
	if(isset($_SESSION['id'])){
		header("Location: orgindex.php");
	}
	
	if(isset($_POST['register'])){
		include_once("db.php");
		
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
		
		$sql_store = "INSERT into USER(username, password, email) VALUES('$username','$password','$email')";
		$sql_fetch_username = "SELECT username FROM USER WHERE username ='$username'";
		$sql_fetch_email = "SELECT email FROM USER WHERE email ='$email'";
		
		$query_username = mysqli_query($db, $sql_fetch_username);
		$query_email = mysqli_query($db, $sql_fetch_email);
	
	
			if(mysqli_num_rows($query_username)){
				echo "There is a username  with that name";
				return;
			}
			if($username == ""){
				echo "please enter a usernam";
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
			
			
			mysqli_query($db, $sql_store);
			header("Location: orgindex.php");
 
	}
	
?>

