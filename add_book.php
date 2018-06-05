<?php
include "db_connection.php";
$isbn = $_POST["isbn"];
$title = $_POST["Title"];
$author = $_POST["author"];
$price = $_POST["price"];
$course = $_POST["course"];
$edition = $_POST["edition"];
$condition = $_POST["condition"];
$description = $_POST["description"];
session_start();
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

  $sql_fetch_book = "INSERT INTO `book_required` (
`BookID` ,
`ISBNum` ,
`BookTitle` ,
`Author` ,
`Edition` ,
`courseNum`  
) 
 VALUES (NULL, '$isbn', '$title', '$author', '$edition', '$course')";
 

 
 
 $result_book = $mysqli->query($sql_fetch_book) or die("an error has occured in trying to fetch book".mysqli_error($mysqli));
 
 include "search_all_books.php";
 
 


?>

<!--<a href="index_search.php">Return to main page</a>-->