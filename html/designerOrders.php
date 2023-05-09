<?php
	session_start();

  echo $desID = $_SESSION['designerID'];
  echo $login_user = $_SESSION['designerUsername'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM orders WHERE designerID='$desID' ORDER BY paymentStatus DESC";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    echo $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

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

    <title>Designer Orders Page</title>

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

.gi-2x{
  font-size: 2em;
}
.gi-3x{
  font-size: 3em;
}
.gi-4x{
  font-size: 4em;
}
.gi-5x{
  font-size: 5em;
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
              <li><a href="shoppingCart.php"><span class="gi-2x glyphicon glyphicon-list-alt"></span></a></li>
              <li><?php if($items>0){ echo "<h4> $items <h4>";}?></li>  

              <li><a title = "click to views your profile" href="#"><span class="glyphicon glyphicon-user"></span><span class="userloggedin"><strong> <?php echo $login_user;?></strong></span><span ></span></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout<span></span></a></li>
            </ul>
          </div>
        </div>
      </nav>

      <br>
      <br>

      <legend style="text-align: center;">Pending Orders & Confirmations List</legend>
      <table class=" table table-hover table-bordered table-striped">

      <tr>
        <td>Order number</td>
        <td>Product Number</td>
        <td>Product Name</td>
        <td>Description</td>
        <td>ItemPrice</td>
        <td style="text-align: center;" colspan="2">Designer</td>
        <td>Payment Status</td>
        <td>Mpesa Code</td>
        <td>Designer Status</td>
        <td>Delivery Status</td>
        <td>Shopper Confirmation</td>
        <td>Decision Status</td>
      </tr>
      <?php 
        $sql1 = "SELECT * FROM orders WHERE designerID = '$desID'";

        $result1 = mysqli_query($conn,$sql1);

        while($row = mysqli_fetch_array($result1)) {     
          echo "<tr>";
          echo "<td>".$row['orderID']."</td>";
          echo "<td>".$row['clothID']."</td>";
          echo "<td>".$row['clothName']."</td>";
          echo "<td>".$row['clothDescription']."</td>";
          echo "<td>Ksh. ".$row['orderPrice']."</td>";
          $desID = $row['designerID'];
          $sql2 = "SELECT designerFname, designerSname FROM designerinfo WHERE designerID = '$desID'";

          $result = mysqli_query($conn,$sql2);

          while($row3 = mysqli_fetch_array($result)) {
            echo "<td>".$row3['designerFname']."</td>";
            echo "<td>".$row3['designerSname']."</td>";
          }

          echo "<td>".$row['paymentStatus']."</td>";
          echo "<td style = 'text-transform: uppercase;'>".$row['paymentCode']."</td>";
          echo "<td>".$row['designerStatus']."</td>";
          echo "<td>".$row['trpAgentStatus']."</td>";
          echo "<td>".$row['shopperStatus']."</td>";        
          echo "<td><button style='margin:5px' type='button' class='btn btn-success btn-block'><a style='text-decoration: none; color: white;' href=\"../php/designerConfirmation.php?id=$row[orderID]\">Confirm Order Completion</a></button> 
          <button style='margin:5px' type='button' class='btn btn-danger btn-block center-blocks'><a style='text-decoration: none; color: white;' href=\"../php/designerCancellation.php?id=$row[orderID]\" onClick=\"return confirm('Are you sure you want to cancel the order placed by the client?')\">Cancel Order</a></button></td>";
          echo "</tr>";   
        }
      ?>
      </table>
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