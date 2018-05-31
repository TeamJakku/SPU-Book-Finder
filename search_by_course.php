<?php
    session_start();
    $id = $_SESSION["id"];
    
    
    ?>

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
<script type="text/javascript">
function clic(element)
{
    var toUser = element.id;
    var book = element.name;
    window.location.href = "http://spubookfinder.dx.am/auto_email_chat.php?username="+toUser+"&book="+book;
    
}
</script>
</head>

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
    while($row = $result->fetch_assoc()):;?>
    
    
    
    <h3><?php echo $row['BookTitle']; ?></h3>
    <div>
    <p><b>ISBN:</b> <?php echo $row['ISBNum'];?></p>
    <p><b>COURSE NUMBER:</b> <?php echo $row['CourseNum'];?></p>
    <p><b>DESCRIPTION:</b> <?php echo $row['Description'];?></p>
    <p><b>CONDITION:</b> <?php echo $row['condition'];?></p>
    <p><b>CONTACT USER:</b> <?php echo $row['username'];?></p>
    <p><b>PRICE: </b>  $<?php echo $row['Price'];?></p>
    <?php echo '<input type="button" onclick="clic(this)" value ="message" id="'.$row['username'].'" name="'.$row['BookTitle'].'" />' ?>

    </div>
    
    <?php endwhile;
    
    
    }else{
        echo "0 results";
    }
    ?>
</div>

