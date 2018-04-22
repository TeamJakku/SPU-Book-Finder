<!--
<?php
  /*session_start();
  if(!isset($_SESSION['id'])){
    header("Location: login.php");
  }

  include "db_connection.php";
*/
?>
-->

<html>
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
    <li><a href="myAccount.php">My Account</a></li>
    <li class="active"><a href="orgindex.php">Search</a></li>
    <li><a href="add_book_form.php">Post</a></li>
    <li><a href="edit_posts.html">Edit</a></li>
  </ul>
</div>

<!-- search books with key workd -->

<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>General Search</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search</label>
  <div class="col-md-5">
    <p class="help-block">Enter a keyword</p>
    <input name="keyword" class="form-control input-md" id="keyword" required="" type="search" placeholder="e.g. data structures">
  </div>
</div>

<!-- Search Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Search Button"></label>
  <div class="col-md-4">
    <button name="Search Button" class="btn btn-primary" id="Search Button">Search</button>
  </div>
</div>

</fieldset>
</form>

<!-- search books by selected course  -->
<form class="form-horizontal" action="search_by_course.php">
<fieldset>

<!-- Form Name -->
<legend>Search by Course</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Course</label>
  <div class="col-md-4">
    <select name="selectbasic" class="form-control" id="selectbasic">
      <option value="CSC 143">Data Structures Java</option>
      <option value="CSC 3430">Algorithm Design</option>
      <option value="CSC 2430">Data Structures C++</option>
      <option value="CSC 3150">System Design </option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Search Button"></label>
  <div class="col-md-4">
    <button name="Search Button" class="btn btn-primary" id="Search Button">Search</button>
  </div>
</div>

</fieldset>
</form>
<!-- search all the books in the database-->
<form class="form-horizontal" action ="search_all_books.php">
<fieldset>

<!-- Form Name -->
<legend>Search All</legend>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Display All Books</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Go</button>
  </div>
</div>

</fieldset>
</form>


<form class="form-horizontal" action ="logout.php">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Logout</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Log out</button>
  </div>
</div>

</fieldset>
</form>







<?php
//search jokes with key word

//include "search_keyword.php";

$mysqli->close();


?>
</body>




</html>
