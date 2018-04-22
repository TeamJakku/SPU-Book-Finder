<html>  

<html lang="en">  

<head>  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>  

<body>
<h1>SPU Book Finder</h1>

<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a href="myAccount.php">My Account</a></li>
    <li><a href="orgindex.php">Search</a></li>
    <li><a href="add_book_form.php">Post</a></li>
    <li><a href="edit_posts.html">Edit</a></li>
  </ul>
</div>

<legend>My Account</legend>

<!-- Code for Sign Up Fields-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="register"></label>
		<div class="col-md-5">
			<label for="inputPassword" class="control-label">Username is:</label>
			<input placeholder="Username" name="username" type="text" autofocus class="form-control">
			<label for="inputPassword" class="control-label">E-mail address is:</label>
			<input placeholder="E-mail Adress" name="email" type="text" class="form-control">
			
			<!-- Code for Password-->
			<label for="inputPassword" class="control-label">Change Password</label>
				
				<div class="help-block">Enter Old Password</div>
					
					<div class="form-group col-sm-6">
						<input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Old Password" required>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group col-sm-6">
						<input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="New Password" required>
						
					</div>

					<div class="form-group col-sm-6">
						<input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Confirm New Password" required>
						
					</div>

				</div>
			
			<output name="result"></output>
		
		</div>
	</div>
	
	<!-- Code for Sign up Button-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button name="register" class="btn btn-primary" id="Register button">Edit</button>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 control-label" for="Search Button"></label>
		<div class="col-md-4">
		<button name="register" class="btn btn-primary" id="Register button">Save</button>
		</div>
	</div>

	</fieldset>
	</form>

</body>  

</html>