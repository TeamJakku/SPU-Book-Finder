<?php
  session_start();
$session_username = $_SESSION["username"];
  
  //session_start();
  //if(!isset($_SESSION['id'])){
    //header("Location: login.php");
  //}

  //include "db.php";

//<link rel="stylesheet" href="style.css">


?>

<html>
<head>

  <title>Search Books</title>

<!-- added -->
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

<!-- <style>

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

</style> -->


<div class="otherH">
<h1 class = "log" style = "background-color: #7F1335;">SPU Book Finder<br>Welcome Administrator</h1>
<div id="mySidenav" class="sidenav">
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

<!-- search books with key workd -->
<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search by Keyword</legend>

<!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->

<div class="form-group">
<label class="col-md-4 control-label" for="selectbasic">Enter Keyword</label>
  <div class="col-md-4">
    <div class="search input-group" id="search" role="search" data-initialize="search">
    <input name="keyword" class="form-control input-md" id="keyword" required="" type="search" placeholder="e.g. data structures" style = " background-color: #FFF2CC; color: black;" >

      <span class="input-group-btn">
        <button name="Search Button" class="btn btn-primary" id="Search Button" style = "background-color: #7F1335;">Search</button>
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
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Select Course</label>
  <div class="col-md-4">
  <div class="search input-group" id="search" role="search" data-initialize="search">
       <select name="selectbasic" class="form-control input-md" id="selectbasic" style = " background-color: #FFF2CC; color: black;">
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
        <span class="input-group-btn">
           <button name="Search Button" class="btn btn-primary" id="Search Button" style = "background-color: #7F1335;">Search</button>
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
           <button  name="singlebutton" class="btn btn-primary" id="singlebutton" style = "background-color: #7F1335;">Display</button>
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