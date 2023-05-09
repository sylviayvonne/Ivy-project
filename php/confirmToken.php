<?php
	session_start();
  echo $email = $_SESSION['email'];
  echo $token = $_SESSION['token'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ivyproject";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	$token = (rand(1111,9999));
  $error = "";

	if(isset($_POST['submit'])){
		if(isset($_POST['email'])){
			$email = trim($_POST['email']);

        $sql = "SELECT * FROM shopperinfo WHERE shopperEmail = '$email' AND passwordReset ='$token'";

        if ($result = mysqli_query($conn, $sql)){

          /* determine number of rows result set */
          $row_cnt = mysqli_num_rows($result);

          if($row_cnt > 0){
            header("location: newPassword.php");
          }else{
            $error = "Wrong Code"; 
          }

          //printf("Result set has %d rows.\n", $row_cnt);

          /* close result set */
          mysqli_free_result($result);
      }

			
		}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ivy Designs</a>
        </div>

        <!--links for navbar on the left-->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><h4>Confirm Code</h4></li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <br>
      <br>

<div class="container container-fluid">
  <h2>Enter The code that was sent to <?php echo $email?></h2>
  <form class="border" action="confirmToken.php" method="POST">
    <div class="form-group">
      <label style="text-align: center;" for="code">Reset Code:</label>
      <input type="text" class="form-control" id="code" placeholder="Enter Code" name="code">
    </div>
    <button type="submit" class="btn btn-block btn-success" name="submit">Submit</button>
  </form>
  <?php 
    if(isset($error)){echo '<h4>Wrong Code</h4>';}?>
</div>

</body>
</html>

