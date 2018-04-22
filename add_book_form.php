<html>  

<html lang="en">  

<head>  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>  

<body>
<h1>SPU Book Finder</h1>
<div class="container">
  <ul class="nav nav-tabs">
    <li><a href="myAccount.php">My Account</a></li>
    <li><a href="orgindex.php">Search</a></li>
    <li class="active"><a href="add_book_form.php">Post</a></li>
    <li><a href="edit_posts.html">Edit</a></li>
  </ul>
</div>
<form class="form-horizontal" action="add_book.php">
<fieldset>

<!-- Form Name -->
<legend>Add Book</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="isbn">ISBN:</label>  
  <div class="col-md-4">
  <input name="isbn" class="form-control input-md" id="isbn" type="text" placeholder="9999999999">
  <span class="help-block">Enter the ISBN of book</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Title">Title</label>  
  <div class="col-md-4">
  <input name="Title" class="form-control input-md" id="Title" type="text" placeholder="e.g Algorithm Design ">
  <span class="help-block">Enter title of the book</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="author">Author</label>  
  <div class="col-md-4">
  <input name="author" class="form-control input-md" id="author" type="text" placeholder="Jon Kleinberg, Eva Tardos">
  <span class="help-block">Enter author</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input name="price" class="form-control input-md" id="price" type="text" placeholder="70.00">
  <span class="help-block">Enter price of book (no dollar sign)</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="course">Course</label>  
  <div class="col-md-4">
  <input name="course" class="form-control input-md" id="course" type="text" placeholder="CSC 3430">
  <span class="help-block">Enter the course for this book</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Edition</label>  
  <div class="col-md-4">
  <input name="edition" class="form-control input-md" id="edition" type="text" placeholder="7th (optional)">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="condition">Condition</label>  
  <div class="col-md-4">
  <input name="condition" class="form-control input-md" id="condition" type="text" placeholder="used/new">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>  
  <div class="col-md-4">
  <input name="description" class="form-control input-md" id="description" type="text" placeholder="(optional)">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button name="add_book_button" class="btn btn-primary" id="singlebutton">SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
<form class="form-horizontal" action ="logout.php">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Logout</label>
  <div class="col-md-4">
    <button name="singlebutton" class="btn btn-primary" id="singlebutton">Logout</button>
  </div>
</div>

</fieldset>
</form>
  

</body>  

</html>