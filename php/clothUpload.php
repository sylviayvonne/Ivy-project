<?php
	session_start();
	echo 'time to upload goods';

	$desID = $_SESSION['designerID'];
  	$login_user = $_SESSION['designerUsername'];

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

			if(isset($_POST['upload'])){
			$target = "../uploads/".basename($_FILES['image']['name']);

			if(isset($_SESSION['designerID'])){
				echo $designerID =  $_SESSION['designerID'];
			}

			if(isset($_FILES['image']['name'])){
				$image = $_FILES['image']['name'];
			}

			if(isset($_POST['category'])){
				echo $clothCategory = trim($_POST['category']);
			}

			if(isset($_POST['price'])){
				echo $clothPrice = trim($_POST['price']);
			}

			if(isset($_POST['name'])){
				echo $clothName = trim($_POST['name']);
			}

			if(isset($_POST['description'])){
				echo $clothDescription = trim($_POST['description']);
			}


			$sql = "INSERT INTO clothesinfo (designerID,clothName,clothDescription,clothPrice,clothCategory,image) VALUES ('$designerID','$clothName','$clothDescription','$clothPrice','$clothCategory','$image')";

			if(mysqli_query($conn, $sql)){
				echo 'cloth details uploaded';

				if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
					echo $msg = "upload success";
					header("location: ../html/designerupload.php");
				}
				else{
					echo $msg = 'upload failed';
				}
			}else 
			{
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

mysqli_close($conn);

			
		}
	} 
	

  	$msg = "";

	

?>