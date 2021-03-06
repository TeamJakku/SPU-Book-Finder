<?php
  
  
  //session_start();
  //if(!isset($_SESSION['id'])){
    //header("Location: login.php");
  //}

  //include "db.php";

//<link rel="stylesheet" href="style.css">


?>

<html>  

<html lang="en">  

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
  <a href="index_administrator.php">Search</a>
  <a href="add_course.php">Add Course</a>
    <!--
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
-->
  <a href="support.php">Support</a>
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
<!--<h2>Post</h2>-->
<!--<div class="container">
  <ul class="nav nav-tabs">
    <li><a href="index.php">Search Book</a></li>
    <li class="active"><a href="add_book_form.php">Post</a></li>
    <li><a href="myAccount.php">Myaccount</a></li>
  </ul>
</div> -->
<div id="main">
<form class="form-horizontal" action="insert_course.php">
<fieldset>

<!-- Form Name -->
<legend>Add Course Information</legend>

<!-- CourseTitle-->
<div class="form-group">
  <label class="col-md-4 control-label" for="course_title">Course Title:</label>  
  <div class="col-md-4">
  <input name="course_title" class="form-control input-md" id="course_title" type="text" placeholder="Algorithm Design">
  <span class="help-block">Enter Course Title:</span>  
  </div>
</div>

<!-- Section-->
<div class="form-group">
  <label class="col-md-4 control-label" for="section">Section:</label>  
  <div class="col-md-4">
  <input name="section" class="form-control input-md" id="section" type="text" placeholder="7">
  <span class="help-block">Enter section</span>  
  </div>
</div>

<!-- ISBN-->
<div class="form-group">
  <label class="col-md-4 control-label" for="course_num">Course Number:</label>  
  <div class="col-md-4">
  <input name="course_num" class="form-control input-md" id="course_num" type="text" placeholder="CSC 3340">
  <span class="help-block">Enter Course Num</span>  
  </div>
</div>


<legend>Book Required for Course </legend>
<!-- ISBN-->
<div class="form-group">
  <label class="col-md-4 control-label" for="isbn">ISBN:</label>  
  <div class="col-md-4">
  <input name="isbn" class="form-control input-md" id="isbn" type="text" placeholder="9999999999">
  <span class="help-block">Enter ISBN</span>  
  </div>
</div>

<!-- Tittle-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Book Title:</label>  
  <div class="col-md-4">
  <input name="Title" class="form-control input-md" id="Title" type="text" placeholder="e.g Algorithm Design ">
  <span class="help-block">Enter Title</span>  
  </div>
</div>

<!-- Author-->
<div class="form-group">
  <label class="col-md-4 control-label" for="author">Author:</label>  
  <div class="col-md-4">
  <input name="author" class="form-control input-md" id="author" type="text" placeholder="Jon Kleinberg, Eva Tardos">
  <span class="help-block">Enter Author</span>  
  </div>
</div>




<!-- Edition-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Edition:</label>  
  <div class="col-md-4">
  <input name="edition" class="form-control input-md" id="edition" type="text" placeholder="7th (optional)">
    
  </div>
</div>




	

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="add_book_button" class="btn btn-primary" id="singlebutton" style = "background-color: #7F1335;">Submit</button>
  </div>
</div>

</fieldset>
</form>
<form class="form-horizontal" action ="logout.php">
<fieldset>

<!-- Form Name -->
<legend></legend>


<!-- Button -->

<!--<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Logout</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Logout</button>
  </div>
</div>-->

</fieldset>
</form>
  
</div>
</body>  

</html>