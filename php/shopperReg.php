<?php
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
else 
echo "Connected successfully";

if (isset($_POST['fName'])) 
{ 
	$shopperfName = trim($_POST["fName"]);
} 

if (isset($_POST['sName'])) 
{ 
	$shoppersName = trim($_POST["sName"]);
} 

if (isset($_POST['username'])) 
{ 
	$shopperusername = trim($_POST["username"]); 
} 

if (isset($_POST['email'])) 
{ 
	$shopperemail = trim($_POST["email"]); 
} 

if (isset($_POST['phone'])) 
{ 
	$shopperPhonenumber = trim($_POST["phone"]); 
} 

if (isset($_POST['county'])) 
{ 
	$shopperCounty = trim($_POST["county"]); 
} 

if (isset($_POST['constituency'])) 
{ 
	$shopperConstituency = trim($_POST["constituency"]);
} 


if (isset($_POST['password'])) 
{ 
	$shopperPassword = md5($_POST["password"]);
} 

$sql = "INSERT INTO shopperinfo (shopperfName, shoppersName,shopperusername, shopperemail, shopperPhonenumber, shopperCounty, shopperConstituency, shopperPassword)
VALUES ('$shopperfName', '$shoppersName', '$shopperusername', '$shopperemail', '$shopperPhonenumber', '$shopperCounty', '$shopperConstituency','$shopperPassword')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: ../html/shopperSuccess.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>