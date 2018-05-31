<?php

session_start();
    
?>
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


<div class="otherH">
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


<span style="font-size:30px; background-color: #7F1335; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776;</span>
<br>
<br>
<br>
<legend style = "background-color: #7F1335; color: #FFF2CC;">My Account</legend>
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
<?php
include "db_connection.php";


if($mysqli->connect_errno){
	echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
}

    $username = $_SESSION['username'];
    

    $sql = "SELECT *  FROM users WHERE username = '$username'";
$result = $mysqli->query($sql);
    


?>

<body style = "background-color:#EDD7B2;">
</div>
<div class="sechalf">
<div id="main">

<!-- Code for Sign Up Fields-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="register"></label>
        <div class="col-md-5">
            <label for="inputPassword" class="control-label">Username is:</label>


			<?php
                while($row = mysqli_fetch_array($result)):;?>
            <p style = "background-color: #FFF2CC;" placeholder="Username"  name="username" type="text" autofocus class="form-control"><?php echo $row['username'];?></p>
            <label for="inputPassword" class="control-label">E-mail address is:</label>
            <p style = "background-color: #FFF2CC;" placeholder="E-mail Adress" name="email" type="text" class="form-control"><?php echo $row['email'];?></p>
            <?php 
				$user_password = $row['password'];
			?>
            <?php endwhile;?>
            <!-- Code for Password-->
            

                </div>
            
            <output name="result"></output>
        
        </div>
    
    
    <!-- Code for Edit Fields Button-->
	<form action="change_password.php" oninput ="result.value=!! new_password.value&&(new_password.value==new_password_confirmed.value)?'Match':'Passwords do not match!'" action="register.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
	
		<label for="inputPassword" class="control-label">Change Password</label>
                
                <div class="help-block"></div>
                    
                    <div class="form-group col-sm-6">
                        <input type="password" name="old_password" class="form-control" id="old_password" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="new_password" data-minlength="6" class="form-control" id="new_password" placeholder="Enter New Password" required>
                        
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="new_password_confirmed" data-minlength="6" class="form-control" id="new_password_confirmed" placeholder="Confirm New Password" required>
						
                         <output name="result"></output>
						
                    </div>
					
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button style = "background-color: #7F1335;" name="register" class="btn btn-primary" id="Register button">Save</button>
        </div>
    </div>
    

    </fieldset>
    </form>
  
</div>
</body>  

</html>
