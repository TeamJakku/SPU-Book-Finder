<html>  

<html lang="en">  

<head>
<meta name="viewport" content= "width-device-width, initial-scale=1">
<style>

	body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #3366cc;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #ffffff;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #ffcc99;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#main {
    transition: margin-left .5s;
    padding: 20px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


</style>  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<h1>SPU Book Finder</h1>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Search</a>
  <a href="add_book_form.php">Post</a>
  <a href="delete_post.php">Delete</a>
  <a href="email_chat.php">Message</a>
  <a href="myAccount.php">My Account</a>
  <a href="logout.php">Log Out</a>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

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

<body>

</div>

<legend>My Account</legend>
<!-- Code for Sign Up Fields-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="register"></label>
        <div class="col-md-5">
            <label for="inputPassword" class="control-label">Username is:</label>
            <p placeholder="Username" name="username" type="text" autofocus class="form-control"></p>
            <label for="inputPassword" class="control-label">E-mail address is:</label>
            <p placeholder="E-mail Adress" name="email" type="text" class="form-control"></p>
            
            <!-- Code for Password-->
            <label for="inputPassword" class="control-label">Change Password</label>
                
                <div class="help-block"></div>
                    
                    <div class="form-group col-sm-6">
                        <input type="password" name="password_confirm" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Enter New Password" required>
                        
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Confirm New Password" required>
                        
                    </div>

                </div>
            
            <output name="result"></output>
        
        </div>
    </div>
    
    <!-- Code for Edit Fields Button-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button name="register" class="btn btn-primary" id="Register button">Save</button>
        </div>
    </div>
    
<!--    <div class="form-group">
        <label class="col-md-4 control-label" for="Search Button"></label>
        <div class="col-md-4">
        <button name="register" class="btn btn-primary" id="Register button">Save</button>
        </div>
    </div>
-->
    </fieldset>
    </form>
  

</body>  

</html>