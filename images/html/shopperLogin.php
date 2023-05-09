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
  else{
    //echo "Connected successfully";

    if(isset($_POST['submit'])){

      if(empty($_POST['email']) || empty($_POST['password'])){
          array_push($errors,'something is missing');
      }
      else{

        //take data from the form 
        $shopperEmail = $_POST['email'];
        $shopperPassword = $_POST['password'];

        //remove any unneccessary characters from the data
        $shopperEmail = stripslashes($shopperEmail);
        $shopperPassword = stripslashes($shopperPassword);

        //remove any SQL command by hackers
        $shopperEmail = mysqli_real_escape_string($conn, $shopperEmail);
        $shopperPassword = mysqli_real_escape_string($conn, $shopperPassword);

        //encrypt the data
        $shopperPassword = md5($shopperPassword);

        $sql="SELECT shopperID, shopperUsername FROM shopperinfo WHERE shopperEmail = '$shopperEmail' AND shopperPassword = '$shopperPassword'";

        $result=mysqli_query($conn,$sql);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        if (mysqli_num_rows($result) == 1){

          //taking session variables
          $_SESSION['shopperID'] = $row['shopperID'];
          $_SESSION['shopperUsername'] = $row['shopperUsername'];

          header("location: ../html/designs.php"); // Redirecting To Other Page
        }
        else{
          //array_push($errors,"Incorrect username or password.");
          $error = "wrong username or password!!!";
        }
      }
    }
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopper Login</title>
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
      <h5 class="my-0 mr-md-auto font-weight-normal">Shopper Login Page</h5>
    </nav>
    <a class="btn btn-outline-primary" href="shopperReg.html">Sign Up</a>
  </div>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="../images/face.png">
        </div>

        <div class="col-12 form-input">
          

          <form action="shopperLogin.php" method="POST">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Login</button>
          </form>
            <br>
            <h3 class="error">
            <?php 
              if(isset($error)){
                echo $error;
              }  
            ?>
          </h3>
        </div>

        <div class="col-12 forgot">
          <a href="../php/passwordReset.php">Forgot Password?</a>
        </div>

      </div> 
    </div> 
  </div>  
</body>
</html>

