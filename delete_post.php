<head>
<meta name="viewport" content= "width-device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<style>
</style> 
  
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
//session_start();
include "db_connection.php";

echo"<h2>All books in database</h2>";
if($mysqli->connect_errno){
	echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
}



$user_id = $_SESSION['id'];

$sql = "SELECT *  FROM book_table WHERE user_id = $user_id";
$result = $mysqli->query($sql);
?>
<body>
<h1>SPU Book Finder</h1>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index_search.php">Search</a>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
  <a href="logout.php">Log Out</a>
</div>

<span style="font-size:30px; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776; Menu</span>

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
<!-- search books by selected course  -->
<form class="form-horizontal" action="drop_book.php" onsubmit="return confirm('Are you sure you want to delete this book');">
<fieldset>

<!-- Form Name -->
<legend>Delete Posts</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">My Books</label>
  <div class="col-md-4">
	<div class="search input-group" id="search" role="search" data-initialize="search">
    <select name="selectbasic" class="form-control input-md" id="selectbasic">

<?php while($row = mysqli_fetch_array($result)):;?>
		<option value="<?php echo $row['BookID'];?>"><?php echo $row['BookTitle'];?></option>
		<?php endwhile;?>
		
		
	

			</select>
	      <span class="input-group-btn">
           <button name="Search Button" class="btn btn-primary" id="Search Button">Delete</button>
          <span class="glyphicon glyphicon-search"></span>
          <span class="sr-only">Search</span>
        </button>
      </span>
	</div>
  </div>
</div>


</fieldset>
</form>
</div>
</body>




