
<html>  

<html lang="en">  

<head>
<title>My Account</title>
<meta name="viewport" content= "width-device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="ix">
<h1 style = "background-color: #7F1335;" class ="log">SPU Book Finder</h1>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index_search.php">Search</a>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
  <a href="logout.php">Log Out</a>
</div>


<span style="font-size:30px; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776;</span>

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

<?php
include_once ("db_connection.php");

$username = strip_tags($_GET['username']);
$username = stripslashes($username);
$username = mysqli_real_escape_string($mysqli, $username);

$sql = "SELECT * FROM users WHERE username ='.$_SESSION[username].' LIMIT 1";

$query = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($query);
$id = $row['id'];

if($result->num_rows>0)
{
	//output data of each row
	while($row = $result->fetch_assoc())
	{
		//$_SESSION['username'] = $row['username'];
		echo "<div><p>Username: $row[username]</p>";
	}
}
else
{
	//echo "0 results";
}
?>

<?php

?>
<body style = "background-color:#EDD7B2;">

</div>

<legend style = "background-color: #7F1335; color: #FFF2CC;">My Account</legend>
<!-- Code for Sign Up Fields-->
<div class="sechalf">
<div id="main">
    <div class="form-group">
        <label class="col-md-4 control-label" for="register"></label>
        <div class="col-md-5">
            <label for="inputPassword" class="control-label">Username is:</label>
            <p placeholder="Username" name="username" type="text" autofocus class="form-control"></p>
            <label for="inputPassword" class="control-label">E-mail address is:</label>
            <p placeholder="E-mail Adress" name="email" type="text" class="form-control"></p>
            
            <!-- Code for Password-->
            <label for="inputPassword" class="control-label">Change Password</label>
                
                <div class="help-block"></div>
                    
                    <div class="form-group col-sm-6">
                        <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Enter New Password" required>
                        
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Confirm New Password" required>
                        
                    </div>

                </div>
            
            <output name="result"></output>
        
        </div>
    </div>
    
    <!-- Code for Edit Fields Button-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button style = "background-color: #7F1335;" name="register" class="btn btn-primary" id="Register button">Save</button>
        </div>
    </div>
    
<!--    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button name="register" class="btn btn-primary" id="Register button">Save</button>
        </div>
    </div>
-->
    </div>
    </fieldset>
    </form>
</div>  

</body>  

</html>