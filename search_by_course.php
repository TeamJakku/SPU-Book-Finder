<?php
    session_start();
    $id = $_SESSION["id"];
    $session_username = $_SESSION["username"];
    
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

  <!--
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
<script type="text/javascript">
function clic(element)
{
    var toUser = element.id;
    var book = element.name;
    window.location.href = "http://spubookfinder.dx.am/auto_email_chat.php?username="+toUser+"&book="+book;
    
}
</script>

 <div class="otherH">
<h1 style = "background-color: #7F1335;" class ="log">SPU Book Finder</h1>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php if($session_username == "administrator"){echo "<a href='index_administrator.php'>Search </a>";}
    else{
      echo "<a href='index_search.php'>Search</a>";
    } ?>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
  <a href="support.php">Support</a>
  <?php if($session_username == "administrator"){echo "<a href='add_course_form.php'>Add Courses </a>";} ?>
  <a href="logout.php">Log Out</a>
</div>

<span style="font-size:30px; background-color: #7F1335; cursor:pointer; color:#FFF2CC;" onclick="openNav()">&#9776;</span>
<br>
<br>
<br>

</div>
<legend style = "background-color: #7F1335; color: #FFF2CC;">Search by Keyword</legend>
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

echo"<h2>All books in $courseSelected </h2>";
$sql = "SELECT * FROM book_table WHERE CourseNum LIKE '%".$courseSelected ."%'";
$result = $mysqli->query($sql);

?>
<div id="accordion">

<?php
if($result->num_rows>0){
    while($row = $result->fetch_assoc()):;?>
    
    
    
    <h3><?php echo $row['BookTitle']; ?></h3>
    <div>
    <p><b>ISBN Number:</b> <?php echo $row['ISBNum'];?></p>
    <p><b>Course Number:</b> <?php echo $row['CourseNum'];?></p>
    <p><b>Description:</b> <?php echo $row['Description'];?></p>
    <p><b>Condition:</b> <?php echo $row['condition'];?></p>
    <p><b>Seller:</b> <?php echo $row['username'];?></p>
    <p><b>Price: </b>  $<?php echo $row['Price'];?></p>
    <?php echo '<input type="button" onclick="clic(this)" value ="Message" id="'.$row['username'].'" name="'.$row['BookTitle'].'" />' ?>

    </div>
    
    <?php endwhile;
    
    
    }else{
        echo "0 results";
    }
    ?>
</div>

<br>
<br>
<?php if($session_username == "administrator"){echo "<a href='index_administrator.php'>Return to Search page</a>";}
    else{
      echo "<a href='index_search.php'>Return to Search Page</a>";
    } ?>
</body>