<?php
include "db_connection.php";
$isbn = $_GET["isbn"];
$title = $_GET["Title"];
$author = $_GET["author"];
$price = $_GET["price"];
$course = $_GET["course"];
$edition = $_GET["edition"];
$condition = $_GET["condition"];
$description = $_GET["description"];


// $new_joke_question = addslashes($new_joke_question);
// $new_answer = addslashes($new_answer);
$isbn = addslashes($isbn);
$title = addslashes($title);
$author = addslashes($author);
$price = addslashes($price);
$course = addslashes($course);
$edition = addslashes($edition);
$condition = addslashes($condition);
$description = addslashes($description);



 $sql = "INSERT INTO book_table (ISBNum, title, author, Edition, price, description,condition_of_book,courseTitle ) 
 VALUES ('$isbn','$title','$author','$edition','$price','$description','$condition','$course')";
 $result = $mysqli->query($sql) or die("an error has occurred");

 include "search_all_jokes.php";
 
 


?>

<a href="index.php">Return to main page</a>