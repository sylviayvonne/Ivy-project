<?php
	session_start();
	echo 'time to upload goods';

	echo $desID = $_SESSION['designerID'];
  	echo $login_user = $_SESSION['designerUsername'];
  	echo $_SESSION['orderID'] = $orderID = $_GET['id'];

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

		$sql = "SELECT * FROM orders WHERE orderID='$orderID'";

		$result = mysqli_query($conn,$sql);

		if (mysqli_query($conn, $sql)) 
		{
		    echo "update success!!!";
		    $row = mysqli_fetch_array($result);

		   	echo $order = $row['orderID'];
		   	echo $cID = $row['clothID'];
		   	echo $cName = $row['clothName'];
		   	echo $cDesc = $row['clothDescription'];
		   	echo $cPrice = $row['orderPrice'];
		   	echo $_SESSION['shopperID'] = $shopID = $row['shopperID']; 
		   	echo $desID = $row['designerID'];

		   	//select shopper location
		   	$sql2 = "SELECT shopperCounty, shopperConstituency FROM shopperinfo WHERE shopperID ='$shopID'";

		   	$result2 = mysqli_query($conn,$sql2);

			if (mysqli_query($conn, $sql2)) 
			{
		    	echo "<br>shopper location";
		    	$row2 = mysqli_fetch_array($result2);

		    	echo $shopcounty = $row2['shopperCounty'];
		    	echo $shopconstituency = $row2['shopperConstituency'];
		   		//header('Location: ../html/shoppingCart.php');
			} 
			else 
			{
			    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}

			//select transporter
			$sql3 = "SELECT * FROM trpagentinfo WHERE (trpAgentCounty = '$shopcounty' OR trpAgentConstituency = '$shopconstituency') ORDER BY jobCount ASC LIMIT 1";

			$result3 = mysqli_query($conn,$sql3);

			if (mysqli_query($conn, $sql3)) 
			{
		    	echo "<br>got trpagenr";
		    	$row3 = mysqli_fetch_array($result3);

		    	echo $_SESSION['agentID'] = $agentID = $row3['trpAgentID'];
		    	echo $agentFname = $row3['trpAgentFname'];
		    	echo $agentSname = $row3['trpAgentSname'];
		    	echo $agentEmail = $row3['trpAgentEmail'];
		    	echo $agentCounty = $row3['trpAgentCounty'];
		    	echo $agentConstituency = $row3['trpAgentConstituency'];
		    	echo $jobCount = $row3['jobCount'];

		   		//header('Location: ../html/shoppingCart.php');
			} 
			else 
			{
			    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
			}

		   	//select transporter with low job count
		   	$sql4 = "UPDATE orders SET designerStatus = 'Confirmed' WHERE orderID='$orderID'";

		   	$result4 = mysqli_query($conn,$sql4);

			if (mysqli_query($conn, $sql4)) 
			{
		    	echo "update success!!!";
		   		//header('Location: ../mailernew/designerOrderComplete.php');
			} 
			else 
			{
			    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
			}

			//increase job count
			$sql5 = "UPDATE trpagentinfo SET jobCount = ('$jobCount' + 1) WHERE trpAgentID ='$agentID'";

		   	$result5 = mysqli_query($conn,$sql5);

			if (mysqli_query($conn, $sql5)) 
			{
		    	echo "update success!!!";
		   		header('Location: ../mailernew/designerOrderComplete.php');
			} 
			else 
			{
			    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
			}

		   	//header('Location: ../html/shoppingCart.php');
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		/*

		$sql = "UPDATE orders SET designerStatus = 'Confirmed' WHERE orderID='$orderID'";

		if (mysqli_query($conn, $sql)) {
	    echo "update success!!!";
	   	//header('Location: ../html/shoppingCart.php');
		} else {
		    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}


		$sql = "UPDATE orders SET designerStatus = 'Confirmed' WHERE orderID='$orderID'";

		if (mysqli_query($conn, $sql)) {
	    echo "update success!!!";
	   	//header('Location: ../html/shoppingCart.php');
		} else {
		    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
		}*/
	}


?>