<html>  

<html lang="en">  

<head>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head><?php include "db_connection.php";?>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
function getBooks(val)
{
	//alert(val);
	$.ajax({
		type:"POST",
		url: "ret_book.php",
		data: 'courseNum='+val,
		success: function(data){
			
			$("#book-list").html(data);
		}
		});
}

</script>
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
<!--<h2>Post</h2>-->
<!--<div class="container">
  <ul class="nav nav-tabs">
    <li><a href="index.php">Search Book</a></li>
    <li class="active"><a href="add_book_form.php">Post</a></li>
    <li><a href="myAccount.php">Myaccount</a></li>
  </ul>
</div> -->
<div id="main">

<form class="form-horizontal" action="add_book_by_course.php" method="post">
<fieldset>
<h3>Enter Book information with Course title</h3>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Course</label>
  <div class="col-md-4">
	<div class="search input-group" id="search" role="search" data-initialize="search">
    <select name="course" class="form-control input-md" id="course" onChange="getBooks(this.value);" required>
		<option value="">None</option>
		<?php
		include "db_connection.php";

	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
	}




	$sql = "SELECT * FROM `course_table` ";
	$result = $mysqli->query($sql);
	
	while($row = mysqli_fetch_array($result)):;?>
		<option value="<?php echo $row['CourseNum'];?>"><?php echo $row['CourseTitle'];?><?php echo "  (".$row['CourseNum'].")";?></option>
		<?php endwhile;?>

    </select>
	<select name="book-list" class="form-control input-md" id="book-list" required>
			<option value="">None</option>
	</select>
	</div>
  </div>
</div>
<!-- Form Name -->
<legend>Add Book</legend>






<!-- Edition-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Edition</label>  
  <div class="col-md-4">
  <input name="edition" class="form-control input-md" id="edition" type="text" placeholder="7th (required)" required>
    
  </div>
</div>

<!-- Text Description input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>  
  <div class="col-md-4">
  <input name="description" class="form-control input-md" id="description" type="text" placeholder="(optional)">
    
  </div>
</div>

<!-- User Details-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="register"></label>
		<div class="col-md-5">
			

				
				<div class="form-group col-sm-6">
					<label for="price" class="control-label">Listing Price</label>
					<input name="price" class="form-control input-md" id="price" type="text" placeholder="70.00" required>

				</div>

				<div class="form-group col-sm-6">
					<label class="control-label" for="condition">Condition</label>
					<select name="condition" class="form-control" id="condition" required>
					    <option value="">None</option>
						<option value="New">New</option>
						<option value="New">Like New</option>
						<option value="Used">Good Used</option>
						<option value="New">Fair</option>
					</select>
				</div>

			</div>
		</div>
	


					<output name="result"></output>
					
				</div>
	</div>
	

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="add_book_button" class="btn btn-primary" id="singlebutton">SUBMIT</button>
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




<!-- ENTER BOOK MANUALLY -->

<form class="form-horizontal" action="add_book.php" method="post">
<fieldset>
<h3>Or Enter Book information manually </h3>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Course</label>
  <div class="col-md-4">
	<div class="search input-group" id="search" role="search" data-initialize="search">
    <select name="course" class="form-control input-md" id="selectbasic" required>
	<option value="">None</option>
		<?php
		include "db_connection.php";

	if($mysqli->connect_errno){
		echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
	}




	$sql = "SELECT * FROM `course_table` ";
	$result = $mysqli->query($sql);
	
	while($row = mysqli_fetch_array($result)):;?>
		<option value="<?php echo $row['CourseNum'];?>"><?php echo $row['CourseTitle'];?><?php echo "  (".$row['CourseNum'].")";?></option>
		<?php endwhile;?>

    </select>
	</div>
  </div>
</div>
<!-- Form Name -->
<legend>Add Book</legend>

<!-- ISBN-->
<div class="form-group">
  <label class="col-md-4 control-label" for="isbn">ISBN:</label>  
  <div class="col-md-4">
  <input name="isbn" class="form-control input-md" id="isbn" type="text" placeholder="9999999999" required>
  <span class="help-block">Enter ISBN</span>  
  </div>
</div>

<!-- Tittle-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Title</label>  
  <div class="col-md-4">
  <input name="Title" class="form-control input-md" id="Title" type="text" placeholder="e.g Algorithm Design " required>
  <span class="help-block">Enter Title</span>  
  </div>
</div>

<!-- Author-->
<div class="form-group">
  <label class="col-md-4 control-label" for="author">Author</label>  
  <div class="col-md-4">
  <input name="author" class="form-control input-md" id="author" type="text" placeholder="Jon Kleinberg, Eva Tardos" required>
  <span class="help-block">Enter Author</span>  
  </div>
</div>





<!-- Edition-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Edition</label>  
  <div class="col-md-4">
  <input name="edition" class="form-control input-md" id="edition" type="text" placeholder="7th (required)" required>
    
  </div>
</div>

<!-- Text Description input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>  
  <div class="col-md-4">
  <input name="description" class="form-control input-md" id="description" type="text" placeholder="(optional)">
    
  </div>
</div>

<!-- User Details-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="register"></label>
		<div class="col-md-5">
			

				
				<div class="form-group col-sm-6">
					<label for="price" class="control-label">Listing Price</label>
					<input name="price" class="form-control input-md" id="price" type="text" placeholder="70.00" required>

				</div>

				<div class="form-group col-sm-6">
					<label class="control-label" for="condition">Condition</label>
					<select name="condition" class="form-control" id="condition" required>
						<option value="">None</option>
            <option value="New">Like New</option>
						<option value="Used">Good Used</option>
            <option value="New">Fair</option>
					</select>
				</div>

			</div>
		</div>
	


					<output name="result"></output>
					
				</div>
	</div>
	

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="add_book_button" class="btn btn-primary" id="singlebutton">SUBMIT</button>
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