<html>
<head>
  <title>Welcome to SPU Book Finder</title>

<?php
//session_start();

//include "db_connection.php";

//include "login.php"

?>

<meta name="viewport" content= "width-device-width, initial-scale=1">
<style>

  body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #3366cc;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #ffffff;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #ffcc99;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#main {
    transition: margin-left .5s;
    padding: 20px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head> 

<body>
<h1>SPU Book Finder</h1>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Search</a>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="myAccount.php">My Account</a>
  <a href="logout.php">Log Out</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

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

  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: login.php");
  }

include "db_connection.php";



?>

<legend>Add Course</legend>

<!-- Code to Add Course-->

<!-- Course Number-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Course Department Number</label>  
  <div class="col-md-4">
  <input name="Title" class="form-control input-md" id="Title" type="text" placeholder="e.g CSC 1230 ">
  <span class="help-block">Enter Course Department and Number</span>  
  </div>

<!-- Course Name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Course Name</label>  
  <div class="col-md-4">
  <input name="Title" class="form-control input-md" id="Title" type="text" placeholder="e.g Problem Solving and Programming ">
  <span class="help-block">Enter Course Name/span>  
  </div>
</div>

</div>
    
    <!-- Code to Submit Button-->
    
    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button name="register" class="btn btn-primary" id="Register button">Submit</button>
        </div>
    </div>

    </fieldset>
    </form>

</body>  

</html>