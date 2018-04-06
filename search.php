<html>
<head>
  <title>Welcome to SPU Book Finder</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<h1>Welcome to SPU book finder</h1>

	<div class="topnav">
		<a class="active" href="edit-account.html">My Account</a>
	    	<a class="active" href="search.php">Search Book</a>
    		<a href="add_book_form.php">Add Book</a>
    		<a href="edit_posts.html">Edit</a>
	</div>
<?php

include "db_connection.php";

//include "search_all_jokes.php";

?>


<!-- search books with key workd -->
<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search for books</label>
  <div class="col-md-5">
    <input name="keyword" class="form-control input-md" id="keyword" required="" type="search" placeholder="e.g. data structures">
    <p class="help-block">Enter a word to search in book database</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Search Button"></label>
  <div class="col-md-4">
    <button name="Search Button" class="btn btn-primary" id="Search Button">Search</button>
  </div>
</div>

</fieldset>
</form>
<!-- search books by selected course  -->
<form class="form-horizontal" action="save_by_course.php">
<fieldset>

<!-- Form Name -->
<legend>Search by course</legend>

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
<form class="form-horizontal" action ="search_all_jokes.php">
<fieldset>

<!-- Form Name -->
<legend>Search all books</legend>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Search all books in database</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Search</button>
  </div>
</div>

</fieldset>
</form>

<form action="add_joke.php">
	

<?php
//search jokes with key word

//include "search_keyword.php";

$mysqli->close();


?>
</body>




</html>
