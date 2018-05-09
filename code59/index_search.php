<?php
	
	
	//session_start();
	//if(!isset($_SESSION['id'])){
		//header("Location: login.php");
	//}

	//include "db.php";



?>

<html>
<head>

  <title>Search Books</title>
  <link rel="stylesheet" href="style.css">

<meta name="viewport" content= "width-device-width, initial-scale=1">
<style>

</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>





<div class="otherH">
<h1 class = "log" style = "background-color: #7F1335;" class ="log">SPU Book Finder</h1>
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
<br>
<br>
<br>
<legend style = "background-color: #7F1335; color: #FFF2CC;">Search by Keyword</legend>
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

<!-- search books with key workd -->
<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->





<!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->

<div class="form-group">
<label class="col-md-4 control-label" for="selectbasic">Enter Keyword</label>
  <div class="col-md-4">
    <div class="search input-group" id="search" role="search" data-initialize="search">
		<input name="keyword" class="form-control input-md" id="keyword" required="" type="search" placeholder="e.g. data structures">
      <span class="input-group-btn">
        <button style = "background-color: #7F1335;" name="Search Button" class="btn btn-primary" id="Search Button">Search</button>
          <span class="glyphicon glyphicon-search"></span>
          <span class="sr-only">Search</span>
        </button>
      </span>
      
    </div>

  </div>
</div>




</fieldset>
</form>


<!-- search books by selected course  -->
<form class="form-horizontal" action="search_by_course.php">
<fieldset>

<!-- Form Name -->
<legend>Search by Course Name</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Course</label>
  <div class="col-md-4">
	<div class="search input-group" id="search" role="search" data-initialize="search">
    <select name="selectbasic" class="form-control input-md" id="selectbasic">
      <option value="CSC 143">Data Structures Java</option>
      <option value="CSC 3430">Algorithm Design</option>
      <option value="CSC 2430">Data Structures C++</option>
      <option value="CSC 3150">System Design </option> 
    </select>
	      <span class="input-group-btn">
           <button style = "background-color: #7F1335;" name="Search Button" class="btn btn-primary" id="Search Button">Search</button>
          <span class="glyphicon glyphicon-search"></span>
          <span class="sr-only">Search</span>
        </button>
      </span>
	</div>
  </div>
</div>


</fieldset>
</form>
<!-- search all the books in the database-->
<form class="form-horizontal" action ="search_all_books.php">
<fieldset>

<!-- Form Name -->
<legend>Display All Available Books</legend>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"> </label>
  <div class="col-md-4">
  <div class="search input-group" id="search" role="search" data-initialize="search">
    <span name="selectbasic" id="selectbasic"></span>
        <span class="input-group-btn">
           <button style = "background-color: #7F1335;" name="singlebutton" class="btn btn-primary" id="singlebutton">Display</button>
          <span class="glyphicon glyphicon-search"></span>
          <span class="sr-only">Search</span>
        </button>
      </span>
  </div>
</div>

</fieldset>
</form>


<form class="form-horizontal" action ="logout.php">
<fieldset>




	


<?php
//search jokes with key word

//include "search_keyword.php";

//$mysqli->close();


?>
</body>




</html>