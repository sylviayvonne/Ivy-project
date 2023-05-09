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
echo "Connected successfully";

if (isset($_POST['fName'])) 
{ 
	$designerfName = trim($_POST["fName"]);
} 

if (isset($_POST['sName'])) 
{ 
	$designersName = trim($_POST["sName"]);
} 

if (isset($_POST['username'])) 
{ 
$designerusername = trim($_POST["username"]); 
} 

if (isset($_POST['email'])) 
{ 
	$designeremail = trim($_POST["email"]); 
} 

if (isset($_POST['phone'])) 
{ 
	$designerPhonenumber = trim($_POST["phone"]); 
} 

if (isset($_POST['county'])) 
{ 
	$designerCounty = trim($_POST["county"]); 
} 

if (isset($_POST['constituency'])) 
{ 
$designerConstituency = trim($_POST["constituency"]);
} 

if (isset($_POST['password'])) 
{ 
	$designerPassword = md5($_POST["password"]);
} 

$sql = "INSERT INTO designerinfo (designerfName, designersName,designerusername, designeremail, designerPhonenumber, designerCounty, designerConstituency, designerPassword)
VALUES ('$designerfName', '$designersName', '$designerusername', '$designeremail', '$designerPhonenumber', '$designerCounty', '$designerConstituency', '$designerPassword')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
     header('Location: ../html/designerSuccess.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>