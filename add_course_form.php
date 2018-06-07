<?php
session_start();
$session_username = $_SESSION["username"];
  //if(!isset($_SESSION['id'])){
    //header("Location: login.php");
  //}

  //include "db.php";

//<link rel="stylesheet" href="style.css">


?>
<?php

  //if(!isset($_SESSION['id'])){
    //header("Location: login.php");
  //}

include "db_connection.php";



?>
<html>
<head>
  <title>Add Course</title>

  <!-- added -->
<link rel="stylesheet" href="style.css"> 

<meta name="viewport" content= "width-device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head> 

<div class="otherH">
<h1 class = "log" class ="log" style = "background-color: #7F1335;">SPU Book Finder</h1>
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
<legend style = "background-color: #7F1335; color: #FFF2CC;">Search</legend>
</div>

<body style = "background-color:#EDD7B2">

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

<div id="main">
<form class="form-horizontal" action="insert_course.php">
<fieldset>

<legend>Add Course</legend>

<!-- Code to Add Course-->

<!-- Course Number-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Course Department Number</label>  
  <div class="col-md-4">
  <input name="course_num" class="form-control input-md" id="course_num" type="text" placeholder="e.g CSC 1230 ">
  <span class="help-block">Enter Course Department and Number</span>  
  </div>

</div>
<!-- Course Name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Course Name</label>  
  <div class="col-md-4">
  <input name="course_title" class="form-control input-md" id="course_title" type="text" placeholder="e.g Problem Solving and Programming ">
  <span class="help-block">Enter Course Name</span>
  </div>
</div>

</div>
    
    <!-- Code to Submit Button-->
    
    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button name="register" class="btn btn-primary" id="Register button" style = "background-color: #7F1335;">Submit</button>
        </div>
    </div>

    </fieldset>
    </form>

</body>  

</html>
