<?php
    session_start();
    $id = $_SESSION["id"];
    
    
    ?>
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
$courseSelected = $_GET["selectbasic"];

echo"<h2>Show all books in course $courseSelected </h2>";
$sql = "SELECT * FROM book_table WHERE CourseNum LIKE '%".$courseSelected ."%'";
$result = $mysqli->query($sql);
    ?>

<div id="accordion">

<?php
    
        
        if($result->num_rows>0){
            //output data of each row
            while($row = $result->fetch_assoc()){
                $id = $row[user_id];
                echo "Contact user: ";
                $sql_get_user_info = "SELECT username FROM users WHERE user_id = ".$id."";
                $res = $mysqli->query($sql_get_user_info);
                if($res->num_rows>0){
                    while($rd=$res->fetch_assoc()){
                        echo "$rd[username]";
                        $username = $rd[username];
                    }
                }
                else
                    echo "error trying to get user inor";
                echo "<h3>$row[BookTitle]</h3>";
                echo "<div><p>Author: $row[Author]</p><p>ISBN Number: $row[ISBNum]</p><p>Course: $row[CourseNum]</p><p>Condition: $row[condition]</p><p>Price: $row[Price].00</p><p>Description: $row[Description]</p><p>Seller: $username</p></div>";
            }
        }else{
            echo "0 results";
        }
    ?>
</div>

<a href="index_search.php">Return to search page</a>
</body>