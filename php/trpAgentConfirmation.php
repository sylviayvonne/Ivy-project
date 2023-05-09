<?php
	session_start();
	echo $disID = $_GET['id'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ivyproject";

	  // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//select agent and shopper IDs
   	$sql = "SELECT * FROM dispatch WHERE dispatchID ='$disID'";

   	$result = mysqli_query($conn,$sql);

	if (mysqli_query($conn, $sql)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row = mysqli_fetch_array($result);
    	echo $orderID = $row['orderID'];
    	echo '<br>';
    	echo $trpFee = $row['trpFee'];
    	echo '<br>';
    	echo $shopperID = $row['shopperID'];
    	echo '<br>';
    	echo $trpAgentID = $row['trpAgentID'];
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	//fetching Agent info
	$sql1 = "SELECT * FROM trpagentinfo WHERE trpAgentID ='$trpAgentID'";

   	$result1 = mysqli_query($conn,$sql1);

	if (mysqli_query($conn, $sql1)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row1 = mysqli_fetch_array($result1);

    	echo $_SESSION['agentFname'] = $trpAgentFname = $row1['trpAgentFname'];
    	echo '<br>';
    	echo $_SESSION['agentSname'] = $trpAgentSname = $row1['trpAgentSname'];
    	echo '<br>';
    	echo $_SESSION['agentEmail'] = $trpAgentEmail = $row1['trpAgentEmail'];
    	echo '<br>';
    	echo $_SESSION['agentPhonenumber'] = $trpAgentPhonenumber = $row1['trpAgentPhonenumber'];
    	echo '<br>';
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
	}

	//fetching shopper info
	$sql2 = "SELECT shopperFname, shopperSname, shopperEmail FROM shopperinfo WHERE shopperID ='$shopperID'";

   	$result2 = mysqli_query($conn,$sql2);

	if (mysqli_query($conn, $sql2)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row2 = mysqli_fetch_array($result2);

    	echo $_SESSION['shopFname'] = $shopperFname = $row2['shopperFname'];
    	echo '<br>';
    	echo $_SESSION['shopSname'] = $shopperFname = $row2['shopperSname'];
    	echo '<br>';
    	echo $_SESSION['shopEmail'] = $shopperEmail = $row2['shopperEmail'];
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
	}

	//confirm delivery status in dispatch table
	$sql3 = "UPDATE dispatch SET deliveryStatus = 'confirmed' WHERE dispatchID = '$disID'";

	if (mysqli_query($conn, $sql3)) 
	{
	    echo "Record updated successfully";
	} 
	else 
	{
	    echo "Error updating record: " . mysqli_error($conn);
	}


	//confirm delivery status in orders table
	$sql3 = "UPDATE orders SET trpAgentID = '$trpAgentID', trpFee = '$trpFee', trpAgentStatus = 'confirmed' WHERE orderID = '$orderID'";

	if (mysqli_query($conn, $sql3)) 
	{
	    echo "<br>confirmed now update wages table";
	} 
	else 
	{
	    echo "Error updating record: " . mysqli_error($conn);
	}

	//get all order info
	$sql4 = "SELECT * FROM orders WHERE orderID ='$orderID'";

   	$result4 = mysqli_query($conn,$sql4);

	if (mysqli_query($conn, $sql4)) 
	{
    	//echo "<br>shopper location";

    	echo '<br>';

    	$row4 = mysqli_fetch_array($result4);

    	echo $_SESSION['finalOrderID'] = $lastorderID = $row4['orderID'];
    	echo '<br>';
    	echo $_SESSION['finaldesignerID'] = $lastdesignerID = $row4['designerID'];
    	echo '<br>';
    	echo $lasttrpAgentID = $row4['trpAgentID'];
    	echo '<br>';
    	echo $_SESSION['finalAgentWage'] = $trpAgentWage = $row4['trpFee'];
    	echo '<br>';
    	echo $_SESSION['finaldesignerWage'] = $designerWage = $row4['orderPrice'];
   		//header('Location: ../html/shoppingCart.php');
	} 
	else 
	{
	    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
	}

	$sql5 = "INSERT INTO wages (orderID, designerID, trpAgentID, trpAgentWage, designerWage) VALUES ('$lastorderID', '$lastdesignerID', '$lasttrpAgentID', '$trpAgentWage', '$designerWage')";

	if (mysqli_query($conn, $sql5)) {
	    echo "New record created successfully";

		    //fetching Agent info
		$sql6 = "SELECT * FROM designerinfo WHERE designerID ='$lastdesignerID'";

	   	$result6 = mysqli_query($conn,$sql6);

		if (mysqli_query($conn, $sql6)) 
		{
	    	//echo "<br>shopper location";

	    	echo '<br>designer info';

	    	$row6 = mysqli_fetch_array($result6);

	    	echo $_SESSION['desFname'] = $desFname = $row6['designerFname'];
	    	echo '<br>';
	    	echo $_SESSION['desSname'] = $desSname = $row6['designerSname'];
	    	echo '<br>';
	    	echo $_SESSION['desEmail'] = $desEmail = $row6['designerEmail'];
	    	echo '<br>';
	    	echo $_SESSION['desPhonenumber'] = $desPhonenumber = $row6['designerPhonenumber'];
	    	echo '<br>';
	   		//header('Location: ../html/shoppingCart.php');
	   		header("Location: ../mailernew/deliverynotice.php");
		} 
		else 
		{
		    echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
		}


	    //header("Location: ../mailernew/deliverynotice.php");
	} else {
	    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
	}




?>