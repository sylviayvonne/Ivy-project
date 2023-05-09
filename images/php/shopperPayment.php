<?php
	session_start();
	$shopper = $_SESSION['shopperID'];
	$login_user = $_SESSION['shopperUsername'];
  $ID = $_GET['id'];
  $_SESSION['payID'] = $ID;

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM orders WHERE orderID='$ID'";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    $row = mysqli_fetch_array($result);
      //echo $accountID = $row['orderID'];
    if(isset($row['orderPrice']))
    {
      $cost = $row['orderPrice'];
    }

    


    
    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Mpesa Payment</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/home.css" rel="stylesheet" type="text/css">
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .grow { transition: all .2s ease-in-out; }
    .grow-button { transition: all .1s ease-in-out; }
  .grow:hover {
   transform: scale(1.1);
   z-index: 1;
   background:  #88ff4d;
  }
  .grow-button:hover {
   transform: scale(1.2);
   z-index: 1;
   background-color: red !important;
  }

  td{
    text-align: center;
  }

  table,tr,td{
    border-radius: 5px;
  }
  </style>
</head>
<body>
  <div class="container container-fluid">
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
              <li class="active"><a href="../index.html">Home</a></li>
            </ul>

            <!--links for navbar on the right-->
            <ul class="nav navbar-nav navbar-right">
              <li><a href="shoppingCart.php"><img src="../images/cart3.png">  <?php if($items>0){ echo "<span class='badge'> $items </span>";}?></a></li>

              <li><a title = "click to views your profile" href="#"><span class="glyphicon glyphicon-user"></span><span class="userloggedin"><strong> <?php echo $login_user;?></strong></span><span ></span></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout<span></span></a></li>
            </ul>
          </div>
        </div>
      </nav>

      <br>
      <br>
      <br>

      <legend style="text-align: center;">Pending Orders List</legend>
      <form action="../php/mpesaInsert.php" method="POST">
        <fieldset>
        <legend style="text-align: left;">Order Payment procedure</legend>
      <div align="left">
        <ol>
          <li>Go to Safaricom SIM Tool Kit and select <strong>M-pesa</strong>.</li>
          <li>In the M-pesa menu select <strong>Lipa na M-pesa</strong>.</li>
          <li>Select <strong>Paybill</strong>.</li>
          <li>Enter Business no: <strong>445123</strong>.</li>
          <li>Enter account number: <strong><?php echo $ID?></strong>.</li>
          <li>Enter amount <strong><?php echo$cost?></strong>.</li>
          <li>Enter  your M-pesa pin.</li>
          <li>Confirm if payment is made to <strong>The Fundis</strong> then press <strong>OK</strong>.</li>
          <li>Input the <strong>M-pesa confirmation code</strong> eg.<strong>LF9480DX00</strong> in the slot below.</li>
        </ol> 
        <div class="form-group col-md-6 col-sm-6 col-xs-6">
            <label for="paymentCode">M-pesa confirmation code:</label>
            <input type="text" class="form-control" id="paymentCode" name="paymentCode" required title="Please give enter the M-pesa confirmation code from your payment." autofocus required maxlength="10" minlength="10" style="text-transform: uppercase;">
        </div>
      </div>
              
      <br/>
      <br/>
      <!--<h5 align="center" class="error"><?php echo $error;?></h5>\-->
      <br/>
      <br/>
      <div align="left" class = "col-md-6 col-sm-6 col-xs-6">
      <button type="submit" name="submit" class="btn btn-info btn-default">Complete payment</button>
      </div>
        </fieldset>
      </form>
  </div>  

      <!-- Footer -->
<footer style="border: 1px solid grey; background: #red !important;" class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns here to organize your footer content.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  
</body>
</html>