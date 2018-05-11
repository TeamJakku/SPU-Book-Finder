<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Message Page</title>
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>




<script type="text/javascript">
$(document).ready(function(){
    // Activate tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});
</script>

 <!--Code to display username of user so they dont have to input it themselves -->
<?php
include_once ("db_connection.php");

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($mysqli,$query);
while($row = mysqli_fetch_array($result))
{
    $email = $row['email'];
}

?>

    </head>



<body style = "background-color:#EDD7B2;">

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

<!-- Form Name -->
<legend style = "background-color: #7F1335; color: #FFF2CC;">Message Page</legend>
 </head>
<body>
<div class="sechalf">


<!--the message form-->
<div id="main">
    <form class="form-horizontal" action="send.php" method="POST">
        <fieldset>
            <div class="form-group">
            
                <label class="col-md-4 control-label">From </label>
            <div class="col-md-4">
                <input type="text" class="form-control input-md" id="keyword" name="from" placeholder="Sender's Username"/> 
                 <!--<p style = " background-color: #FFF2CC; color: black;" type="text" class="form-control input-md" id="keyword" name="from"> <?php echo $_SESSION['username'];?> </p>-->
            </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
           
                <label class="col-md-4 control-label" >To</label>
            <div class="col-md-4">
                <input type="text" class="form-control input-md" id="keyword" name="to" placeholder="Recipient's Username"/>
            </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
            
                <label class="col-md-4 control-label">Subject</label>
            <div class="col-md-4">  
                <input type="text" class="form-control input-md" id="keyword" name="subject" placeholder="Subject"/>
            </div>
            </div>
        </fieldset>

        <fieldset>
            <div class="form-group">
            
                <label class="col-md-4 control-label">Message</label>
            <div class="col-md-4">
                <textarea style = "background-color: #FFF2CC;" name="message" class="form-control input-md" id="description" placeholder="Type Your Message Here"></textarea> 
           
                <input style = "background-color: #7F1335;" class="btn btn-primary" type="submit" name="submit" value="Send">
            </div>
            </div>
        </fieldset>
    </form>
  </div>
<!--end of message form-->
</body>
</html>