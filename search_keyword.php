<html>  

<html lang="en">  

<head>
<title>Search by Keyword</title>

  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <link href="jquery-ui.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>

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
<legend style = "background-color: #7F1335; color: #FFF2CC;">Search by Course</legend>
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
<?php
include "db_connection.php";
$keywordfromform = $_GET["keyword"];

echo"<h2>Show all books with the keyword $keywordfromform in title</h2>";
$sql = "SELECT ISBNum, title, author, price, description, condition_of_book  FROM book_table WHERE title LIKE '%".$keywordfromform ."%'";
$result = $mysqli->query($sql);

?>
<div id="accordion">
<?php
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		
		echo "<h3>$row[title]</h3>";
		echo "<div><p>$row[author]</p><p>$row[ISBNum]</p><p>$row[description]</p><p>$row[condition_of_book]</p></div>";
	}
}else{
	echo "0 results";
}

?>
</div>
<a href="index_search.php">Return to search page</a>
</body>