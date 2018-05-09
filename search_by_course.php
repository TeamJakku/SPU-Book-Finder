<html>  

<html lang="en">  

<head>
<title>Search by Course</title>

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
$courseSelected = $_GET["selectbasic"];

echo"<h2>Show all books in course $courseSelected </h2>";
$sql = "SELECT ISBNum, title, author, price, description, condition_of_book  FROM book_table WHERE courseTitle LIKE '%".$courseSelected ."%'";
$result = $mysqli->query($sql);

?>
<div id="accordion">
<?php
if($result->num_rows>0){
	//output data of each row
	while($row = $result->fetch_assoc()){
		
		echo "<h3>$row[title]</h3>";
		echo "<div><p>Author: $row[author]</p><p>ISBN: $row[ISBNum]</p><p>Condition: $row[condition_of_book]</p><p>Description: $row[description]</p><p>Sold by: $row[user_id]</p><p>Price: $$row[price].00</p><button>Message</button></div>";
	}
}else{
	echo "0 results";
}

?>
</div>

<a href="index_search.php">Return to main page</a>
</body>