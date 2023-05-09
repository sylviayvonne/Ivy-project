<?php
	session_start();
	echo 'time to shop';
	echo $_SESSION['shopperID'];
	$login_user = $_SESSION['shopperUsername']; 
	echo $login_user;
	echo $clothID = $_GET['id'];

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
		echo "Connected successfully";

		$sql = "SELECT clothID, clothName,clothDescription,clothPrice, designerID FROM clothesinfo WHERE clothID = '$clothID'";

		$result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)>0){
        	//collects cloth details
        	echo $clothID = $row['clothID'];
        	echo $clothName = $row['clothName'];
        	echo $clothDescription = $row['clothDescription'];
        	echo $orderPrice = $row['clothPrice'];
        	echo $designerID = $row['designerID'];
        	echo $shopperID = $_SESSION['shopperID'];
        }

        $sql1 = "INSERT INTO orders (clothID, clothName, clothDescription, orderPrice, shopperID, designerID) VALUES ('$clothID', '$clothName', '$clothDescription', '$orderPrice', '$shopperID', '$designerID')";

        if (mysqli_query($conn, $sql1)) {
	    //echo "New Order Created";
	    header('Location: ../html/designs.php');
		} else {
		    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}

	} 
	
?>