<?php 

ob_start();

session_start(); 
	
	include_once("db.php");

	
	//got rid of this because it caused an error
	//header already sent
	
	if(isset($_POST['login'])){
		
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);
		
		$password = md5($password);
		
		
		
		$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
		$query = mysqli_query($db, $sql);
		

		$selectActive = mysqli_query($db, "SELECT active FROM users WHERE username = '$username' ");

		$row = mysqli_fetch_array($selectActive, MYSQLI_NUM);
		$active = $row[0];

		//echo $active;
		//if(isset($query)){echo "query is set";}else{echo "query is not set";}
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$id = $row['id'];
		$db_password = $row['password'];
		
		if((strcmp($password,$db_password) ==0) && $username == "administrator" && $active == 1){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id; 
			header("Location: index_administrator.php");
		}
		if(strcmp($password,$db_password) ==0 && $active == 1){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			header("Location: index_search.php");
		}else{
			echo "<h4>Error Loging in. Invalid username password combination or activate your account</h4>";
		}
		
		
	
		
	}
	else{
		//echo "not set";
	}
	

?>

<html>
<head>
	<title>SPU Sign Up/Login</title>
	<link rel="stylesheet" href="style.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function validateForm(){
    var username = document.forms["myform"]["username"].value;
    var email = document.forms["myform"]["email"].value;
    var password = document.forms["myform"]["password"].value;
    var password_confirm = document.forms["myform"]["password_confirm"].value;
    if(username.length < 5){
        alert("name must be at least 5 characters long");
        return false;
    }
    if(username.length > 30){
        alert("username must be at most 30 characters long");
        return false;
    }
    
    var index = email.indexOf("@spu.edu");
    var target = email.length - 8; //number of letters in @spu.edu
    if(index == -1 || index != target){
        alert("invalid email. Must use an spu email");
        return false;
    }
    if(password.length < 5){
        alert("password must be at least 5 characters long");
        return false;
    }
    if(password.length > 20){
        alert("password must be at most 20 characters long");
        return false;
    }
    if(password != password_confirm)
    {
        alert("passwords do not match");
        return false;
    }
    
}
</script>
</head>

<body style = "background-color:#EDD7B2;">
	<div style = "background-color: #7F1335;" name="background block" class="ix">
	<h1 class="log">Welcome to SPU Book Finder</h1>
	</div>

	
	<div class="des">
	<p class="desfont">A web-based application that facilitates the process of purchasing and selling textbooks </p>
	
	
	<div class="sechalf">
	<form class = "form-horizontal" action="login.php" method="post" enctype="multipart/form-data">
	<fieldset>
	
	
	<div class="form-group">
	
		<label class="col-md-4 control-label" for="login"></label>
		
		<div class="col-md-5">
		
			<h2 class="t">Login</h2>
			
			<p class="help-block"> Enter your username and password</p>
			<div class="logoutline">
			<input placeholder="Username" name="username" type="text" autofocus class="form-control" >
			<input placeholder="Password" name="password" type="password" class="form-control">
		</div>
		</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button style = "background-color: #7F1335;" name="login" class="btn btn-primary" id="Signin Button">Sign In</button>
		</div>
	</div>
	</fieldset>
	</form>
	
	
	
	
	<form name="myform" class="form-horizontal" oninput ="result.value=!!password_confirm.value&&(password.value==password_confirm.value)?'Match':'Passwords dont match'" action="new-register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
	<fieldset>
	

	
	<div class="form-group">
	
		<label class="col-md-4 control-label" for="register"></label>
		<div class="col-md-5">
		<h2 class="t">Sign Up </h2>
			<p class="help-block"> Enter in the following</p>
			
			<div class="logoutline">
			<input placeholder="Username" name="username" type="text" autofocus class="form-control">
			
			<input placeholder="E-mail Adress" name="email" type="text" class="form-control">
		
			<input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
				
			<input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>

			</div>

			<output name="result"></output>
			
		</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button style = "background-color: #7F1335;" name="register" class="btn btn-primary" id="Register button">Register</button>
		</div>
	</div>
	
	</fieldset>
	</form>
	
	</div>
</body>
</html>
