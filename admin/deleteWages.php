<?php
//including the database connection file
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM wages WHERE wageID=$id";
if(mysqli_query($conn,$sql)==TRUE){
//redirecting to the display page (index.php in our case)
	echo "success";
	header("Location: wages.php");
}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>