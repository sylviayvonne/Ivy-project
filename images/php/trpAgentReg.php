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
	$trpAgentfName = trim($_POST["fName"]);
} 

if (isset($_POST['sName'])) 
{ 
	$trpAgentsName = trim($_POST["sName"]);
} 

if (isset($_POST['username'])) 
{ 
    $trpAgentusername = trim($_POST["username"]); 
} 

if (isset($_POST['email'])) 
{ 
	$trpAgentemail = trim($_POST["email"]); 
} 

if (isset($_POST['phone'])) 
{ 
	$trpAgentPhonenumber = trim($_POST["phone"]); 
} 

if (isset($_POST['county'])) 
{ 
	$trpAgentCounty = trim($_POST["county"]); 
} 

if (isset($_POST['constituency'])) 
{ 
    $trpAgentConstituency = trim($_POST["constituency"]);
} 

if (isset($_POST['password'])) 
{ 
	$trpAgentPassword = md5($_POST["password"]);
} 

$sql = "INSERT INTO trpAgentinfo (trpAgentfName, trpAgentsName,trpAgentusername, trpAgentemail, trpAgentPhonenumber, trpAgentCounty, trpAgentConstituency, trpAgentPassword)
VALUES ('$trpAgentfName', '$trpAgentsName', '$trpAgentusername', '$trpAgentemail', '$trpAgentPhonenumber', '$trpAgentCounty', '$trpAgentConstituency', '$trpAgentPassword')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header('Location: ../html/trpAgentSuccess.html'); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>