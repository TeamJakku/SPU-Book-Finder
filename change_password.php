<?php
session_start();
	if(isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	if(isset($_POST['register'])){
	
	    include_once("db.php");

		
		$oldpassword = strip_tags($_POST['old_password']);
		$password = strip_tags($_POST['new_password']);
		$password_confirm = strip_tags($_POST['new_password_confirmed']);
		
		
		$oldpassword = stripslashes($oldpassword);
		$password = stripslashes($password);
		$password_confirm = stripslashes($password_confirm);
		
		
		$password = mysqli_real_escape_string($db, $password);

		echo "$oldpassword";
		echo "$password";
		echo "$password_confirm";
		$oldpassword = md5($oldpassword);
		$password = md5($password);
		$password_confirm = md5($password_confirm);
		
		
		
        $user_id = $_SESSION['id'];
		
		echo"$user_id\n";

        $sql = "SELECT password FROM users WHERE user_id = $user_id LIMIT 1";
		
	    $result = mysqli_query($db, $sql);
		
		while($row = $result->fetch_assoc()){
			$old_db_password = $row['password'];
		}
		echo "$old_db_password";

		if($password != $password_confirm){
				echo "New Passwords do not match!";
				return;
		}
		if($old_db_password != $oldpassword){
			echo "Your old password doesn not match our records";
		}
		
		$sql_insert_new_password = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
		$update = mysqli_query($db,$sql_insert_new_password) or die(mysqli_error($db));
		
		if(mysqli_affected_rows($db) == 1){
			echo "success";
		}
		else{
			echo "unsuccess";
		}
		

		
	}
	
?>