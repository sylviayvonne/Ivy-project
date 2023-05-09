<?php
	session_start();
	echo $shopper = $_SESSION['shopperID'];
	echo $login_user = $_SESSION['shopperUsername'];
	echo $orderID = $_GET['id'];

	//gives variable for creating the connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ivyproject";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check  whether the connection was successful
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	else{
		$sql = "UPDATE orders SET shopperStatus='Confirmed' WHERE orderID='$orderID'";

		if (mysqli_query($conn, $sql)) {
	    //echo "update success!!!";
	   	header('Location: ../html/shoppingCart.php');
		} else {
		    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}
	}

?>