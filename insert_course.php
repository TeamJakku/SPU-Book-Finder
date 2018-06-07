<?php
include "db_connection.php";
$course_title = $_GET["course_title"];
$section = $_GET["section"];
$course_num = $_GET["course_num"];
//field for book required
$isbn = $_GET["isbn"];
$title = $_GET["Title"];
$author = $_GET["author"];
$edition = $_GET["edition"];


$course_title = addslashes($course_title);
$section = addslashes($section);
$course_num = addslashes($course_num);

$isbn = addslashes($isbn);
$title = addslashes($title);
$author = addslashes($author);
$edition = addslashes($edition);



 //$sql_fetch_book = "INSERT INTO `book_required` (
//`BookID` ,
//`ISBNum` ,
//`BookTitle` ,
//`Author` ,
//`Edition` ,
//`courseNum`
//)
// VALUES (NULL, '$isbn', '$title', '$author', '$edition', '$course_num')";
 
 $sql_fetch_course = "INSERT INTO `course_table` (
`CourseID` ,
`CourseTitle` ,
`Section` ,
`CourseNum`
) 
 VALUES (NULL, '$course_title', '$section', '$course_num')";
 
 $result_course = $mysqli->query($sql_fetch_course) or die("an error has occured in trying to fetch course".mysqli_error($mysqli));
 //$result_book = $mysqli->query($sql_fetch_book) or die("an error has occured in trying to fetch book".mysqli_error($mysqli));

 include "search_all_books.php";
 
 


?>

