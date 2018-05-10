<head>
 
</head>

<?php
include "db_connection.php";
$bookID = $_GET["selectbasic"];

echo"<h2>Selected Book ID  $bookID </h2>";
$sql = "DELETE FROM `books`.`book_table` WHERE `book_table`.`BookID` ='$bookID'";
$result = $mysqli->query($sql);

if ($result === TRUE) {
    echo "Post deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}



?>

