<html>  

<html lang="en">

<head>
  <title>Post Deleted</title>

  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <link href="jquery-ui.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 

  <div class="otherH">
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
<br>
<br>
<br>

</div>
<legend style = "background-color: #7F1335; color: #FFF2CC;">Post Deleted</legend>
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
</head>

<body style = "background-color:#EDD7B2;">
	<br>
<?php
include "db_connection.php";
$bookID = $_GET["selectbasic"];

echo"<h3>Selected Book ID $bookID </h3>";

$sql = "DELETE FROM `book_table` WHERE `book_table`.`BookID` ='$bookID'";
$result = $mysqli->query($sql);

if ($result === TRUE) {
    echo "Post Deleted Successfully";
} else {
    echo "Error Deleting Record: " . $conn->error;
}



?>
<br>
<br>
<br>
<a href="delete_post.php">Back</a>
</body>