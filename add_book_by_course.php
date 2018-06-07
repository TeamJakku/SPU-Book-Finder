<?php
session_start();
include "db_connection.php";

$course = $_POST["course"];
$bookID = $_POST["book-list"];
$edition = $_POST["edition"];
$condition = $_POST["condition"];
$description = $_POST["description"];
$price = $_POST["price"];



$sql = "SELECT * FROM `book_required` WHERE courseNum = '$course'  AND BookID = '$bookID' LIMIT 1";
$result = $mysqli->query($sql);


		while($row = mysqli_fetch_array($result)){
		    $isbn = $row["ISBNum"];
			$title = $row["BookTitle"];
			$author = $row["Author"];
		}

$username = $_SESSION['username'];
//echo "$user_id";
// $new_joke_question = addslashes($new_joke_question);
// $new_answer = addslashes($new_answer);
$user_id = addslashes($user_id);
$isbn = addslashes($isbn);
$title = addslashes($title);
$author = addslashes($author);
$price = addslashes($price);
$course = addslashes($course);
$edition = addslashes($edition);
$condition = addslashes($condition);
$description = addslashes($description);


 $sql = "INSERT INTO `book_table` (
 `BookID` ,
`ISBNum` ,
`BookTitle` ,
`Author` ,
`Edition` ,
`Price` ,
`Description` ,
`condition` ,
`CourseNum` ,
`username`
) 
 VALUES (NULL, '$isbn', '$title', '$author', '$edition', '$price', '$description', '$condition', '$course', '$username')";
 $result = $mysqli->query($sql) or die("an error has occured");

    if ($result === TRUE) {
        header("refresh:2; url=search_all_books.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

?>


