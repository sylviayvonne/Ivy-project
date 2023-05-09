<?php
  session_start();
  //gives variable for creating the connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  $error;

  // Create connection
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
  if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    //echo "Connected successfully";

    if(isset($_POST['submit'])){

      //echo 'submit is working';

      if(empty($_POST['email']) || empty($_POST['password'])){
          $error = 'something is missing';
      }
      else{
        $trpAgentEmail = $_POST['email'];
        $trpAgentPassword = $_POST['password'];
        $trpAgentEmail = stripslashes($trpAgentEmail);
        $trpAgentPassword = stripslashes($trpAgentPassword);
        $trpAgentEmail = mysqli_real_escape_string($conn, $trpAgentEmail);
        $trpAgentPassword = mysqli_real_escape_string($conn, $trpAgentPassword);
        $trpAgentPassword = md5($trpAgentPassword);

        $sql="SELECT trpAgentID, trpAgentUsername FROM trpAgentinfo WHERE trpAgentEmail = '$trpAgentEmail' AND trpAgentPassword = '$trpAgentPassword'";

        $result=mysqli_query($conn, $sql);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        if(mysqli_num_rows($result) == 1){

          //taking session variables
          $_SESSION['trpAgentID'] = $row['trpAgentID'];
          $_SESSION['trpAgentUsername'] = $row['trpAgentUsername'];

          header("location: ../html/trpAgentHome.php"); // Redirecting To Other Page
        }
        else{
          $error = "wrong username or password!!!";
        }
      }
    }
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <title>trpAgent Login</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="../css/shopperLogin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <style type="text/css">
    .error
    {
      color: #ffff33;
      font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
      font-size:18px;
      text-transform: capitalize;
    }
  </style>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Ivy Designs and Stores</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <h5 class="my-0 mr-md-auto font-weight-normal">Transport Agent Login Page</h5>
    </nav>
    <a class="btn btn-outline-primary" href="trpAgentReg.html">Sign Up</a>
  </div>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="../images/face.png">
        </div>

        <div class="col-12 form-input">
          <form action="trpAgentLogin.php" method="POST">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Login</button>
            
          </form> 
        </div>

        <h3 class="error">
            <?php 
              if(isset($error)){
                echo $error;
              }  
            ?>
          </h3>

        <div class="col-12 forgot">
          <a href="#">Forgot Password?</a>
        </div>

      </div> 
    </div> 
  </div>  
</body>
</html>

