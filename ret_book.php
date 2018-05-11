<html>

<?php
include "db_connection.php";

	//$sql = "SELECT * FROM book_required";
	$sql = "SELECT * FROM `book_required` WHERE courseNum='".$_POST["courseNum"]."'";
	$result = $mysqli->query($sql);

	if($mysqli->connect_errno){
		?>
		<option> error</option>
		<?php
		echo "Failed to connect to MySQL; (". $mysqli->connect_errno.")".$mysqli->connect_errno;
	}
	else{
		?>
		<option>Now Select book</option>
		<?php
		echo "succes";
	}

?>

<?php
		while($row = mysqli_fetch_array($result)):;?>
		<option value="<?php echo $row['BookID'];?>"><?php echo "TITLE: ".$row['BookTitle'];?><?php echo "\t COURSE:".$row['courseNum'];?><?php echo "\t AUTHOR:".$row['Author'];?> </option>
		<?php endwhile;?>

</html>

