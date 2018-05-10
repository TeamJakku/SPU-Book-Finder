
<?php
	session_start();
	
	if(isset($_POST['login'])){
		include_once("db.php");
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);
		
		$password = md5($password);
		
		
		
		$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
		$query = mysqli_query($db,$sql);
		
		$row = mysqli_fetch_array($query);
		$id = $row['user_id'];
		$db_password = $row['password'];
		
		
		if((strcmp($password,$db_password) ==0) && $username == "administrator"){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id; 
			header("Location: index_administrator.php");
		}
		else if(strcmp($password,$db_password) ==0){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			header("Location: index.php");
		}else{
			echo "$password";
			echo "$db_password";
		}
		
		
	
		
	}


?>

<html>
<head>
	<title>SPU SIGN UP/Login</title>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 style="font-family: Tahoma;">Welcome to SPU Book Finder</h1>
	
	
	<form class = "form-horizontal" action="login.php" method="post" enctype="multipart/form-data">
	<fieldset>
	
	<div class="form-group">
	
		<label class="col-md-4 control-label" for="login"></label>
		<div class="col-md-5">
			<h2>Login</h2>
			<input placeholder="Username" name="username" type="text" autofocus class="form-control" >
			<input placeholder="Password" name="password" type="password" class="form-control">
			
			<p class="help-block"> Enter your username and password</p>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button name="login" class="btn btn-primary" id="Signin Button">Signin</button>
		</div>
	</div>
	</fieldset>
	</form>
	
	
	
	
	<form class="form-horizontal" oninput ="result.value=!!password_confirm.value&&(password.value==password_confirm.value)?'Match':'Nope!'" action="register.php" method="post" enctype="multipart/form-data">
	<fieldset>
	

	
	<div class="form-group">
	
		<label class="col-md-4 control-label" for="register"></label>
		<div class="col-md-5">
		<h2>Sign Up </h2>
			<input placeholder="Username" name="username" type="text" autofocus class="form-control">
			
			

			<input placeholder="E-mail Adress" name="email" type="text" class="form-control">
			
			  
			<input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
				
			<input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
				
			
			<output name="result"></output>
			<p class="help-block"> Enter your username and password</p>
		</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button name="register" class="btn btn-primary" id="Register button">Register</button>
		</div>
	</div>
	
	</fieldset>
	</form>
	
	
</body>
</html>
	

