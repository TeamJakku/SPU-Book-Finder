<?php 
session_start();



?>

<?php


include "db_connection.php";


if($mysqli->connect_errno){
  echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
}






    $username = $_SESSION['username'];

$sql = "SELECT *  FROM book_table WHERE username = '$username'";
$result = $mysqli->query($sql);
$num = mysqli_num_rows($result);
?>

<head>
<title>Delete</title>
<meta name="viewport" content= "width-device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script>
function validateForm1(){
    var bookValue = document.forms["myForm"]["book-list"].value;
    if(bookValue == "not"){
        alert("You have no books posted");
        return false;
        
    }
    var bookTitle = document.forms["myForm"]["book-list"].text;
    return confirm("Are you sure you want to delete " + bookTitle);
    
}
</script>

<div class="otherH">
<body style = "background-color:#EDD7B2;">
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

<legend style = "background-color: #7F1335; color: #FFF2CC;">Delete Posts</legend>
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

<div id="main">
<!-- search books by selected course  -->
<form name="myForm" class="form-horizontal" action="drop_book.php" onsubmit="return validateForm1()">
<fieldset>

<!-- Form Name -->

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">My Books</label>
  <div class="col-md-4">
	<div class="search input-group" id="search" role="search" data-initialize="search">
    <select style = "background-color: #FFF2CC;" name="book-list" class="form-control input-md" id="selectbasic">
<?php if($num ==0) { ?>
            <option value ="not"> You have no books posted </option>
    
<?php
    }else{
    while($row = mysqli_fetch_array($result)):;?>
		<option value="<?php echo $row['BookID'];?>"><?php echo $row['BookTitle'];?></option>
		<?php endwhile;
            }
            ?>
		
		
	

			</select>
	      <span class="input-group-btn">
           <button style = "background-color: #7F1335;" name="Search Button" class="btn btn-primary" id="Search Button">Delete</button>
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




