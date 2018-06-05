<?php
include "db_connection.php";
$bookID = $_GET["book-list"];

$sql = "DELETE FROM `book_table` WHERE `book_table`.`BookID` ='$bookID'";
$result = $mysqli->query($sql);

if ($result === TRUE) {
    header("refresh:2; url=delete_post.php");
} else {
    echo "Error deleting record: " . $conn->error;
}



?>

<head>

</head>

