<?php
	session_start();
	echo $shopper = $_SESSION['shopperID'];
	echo $login_user = $_SESSION['shopperUsername'];
	echo $ID = $_SESSION['payID'];

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

		if(isset($_POST['submit'])){
			echo 'submit is on';
			if(isset($_POST['paymentCode'])){
				echo $payCode =  trim($_POST['paymentCode']);
			}

			$sql = "UPDATE orders SET paymentCode ='$payCode', paymentStatus = 'Paid' WHERE orderID='$ID'";

			if (mysqli_query($conn, $sql)) {
		    echo "update success!!!";
		   	header('Location: ../mailernew/paynotice.php');
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	}

		} 
		
?>