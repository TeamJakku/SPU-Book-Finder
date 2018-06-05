<?php
session_start();
$session_username = $_SESSION["username"];
	if(isset($_SESSION['id'])){
		header("Location: index.php");
	}
	?>
	

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
	if(isset($_POST['register'])){
	
	    include_once("db.php");

		
		$oldpassword = strip_tags($_POST['old_password']);
		$password = strip_tags($_POST['new_password']);
		$password_confirm = strip_tags($_POST['new_password_confirmed']);
		
		
		$oldpassword = stripslashes($oldpassword);
		$password = stripslashes($password);
		$password_confirm = stripslashes($password_confirm);
		
		
		$password = mysqli_real_escape_string($db, $password);

		$oldpassword = md5($oldpassword);
		$password = md5($password);
		$password_confirm = md5($password_confirm);
		
		
		
        $username = $_SESSION['username'];
		

        $sql = "SELECT password FROM users WHERE username = '$username' LIMIT 1";
		
	    $result = mysqli_query($db, $sql);
		
		while($row = $result->fetch_assoc()){
			$old_db_password = $row['password'];
		}

		if($password != $password_confirm){
				echo "New Passwords do not match!";
				echo  nl2br ("\n");
				echo  nl2br ("\n");
				echo "<a href='myAccount.php'>Return to My Account page</a>";
				return;
		}
		if($old_db_password != $oldpassword){
			echo "Your old password does not match our records";
			echo  nl2br ("\n");
			echo  nl2br ("\n");
			echo "<a href='myAccount.php'>Return to My Account page</a>";
            return;
		}
        if($old_db_password == $password){
            echo "Your old password is the same as your new password";
			echo  nl2br ("\n");
			echo  nl2br ("\n");
			echo "<a href='myAccount.php'>Return to My Account page</a>";
            return;
        }
		
		$sql_insert_new_password = "UPDATE users SET password = '$password' WHERE username = '$username'";
		$update = mysqli_query($db,$sql_insert_new_password) or die(mysqli_error($db));
		
		if(mysqli_affected_rows($db) == 1){
			echo "Your password has been changed successfully";
			echo  nl2br ("\n");
			echo  nl2br ("\n");
			echo "<a href='myAccount.php'>Return to My Account page</a>";
		}
		else{
			echo "Something went wrong try again later";
			echo  nl2br ("\n");
			echo  nl2br ("\n");
			echo "<a href='myAccount.php'>Return to My Account page</a>";
		}
		

		
	}

?>


