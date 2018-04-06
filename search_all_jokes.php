<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Accordion - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head>

<?php
include "db_connection.php";

echo"<h2>All books in database</h2>";
if($mysqli->connect_errno){
	echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
}
echo $mysqli->host_info. "\n";

$sql = "SELECT ISBNum, title, author, price, description, condition_of_book  FROM book_table";
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