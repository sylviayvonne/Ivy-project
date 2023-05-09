<?php
  session_start();

  echo $trpID = $_SESSION['trpAgentID'];
  $login_user = $_SESSION['trpAgentUsername'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM dispatch WHERE trpAgentID='$trpID' ORDER BY paymentStatus DESC";

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

    <title>Disaptch Table</title>

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

      <legend style="text-align: center;">Pending Dispatch & Confirmations List</legend>
      <table class=" table table-hover table-bordered table-striped">

        <!--Table Headings-->  
        <tr>
          <td>Dispatch Order Number</td>
          <td>Product Name</td>
          <td>Transport Fee</td>
          <td style="text-align: center;" colspan="2">Shopper</td>
          <td>Delivery Status</td>
          <td>Decision Status</td>
        </tr>

        <?php 
          $sql1 = "SELECT * FROM dispatch WHERE trpAgentID = '$trpID'";

          $result1 = mysqli_query($conn,$sql1);

          while($row = mysqli_fetch_array($result1)) {     
            echo "<tr>";
            echo "<td>".$row['dispatchID']."</td>";
            echo "<td>".$row['clothName']."</td>";
            echo "<td>Ksh. ".$row['trpFee']."</td>";

            $shopperID = $row['shopperID'];

            $sql2 = "SELECT shopperFname, shopperSname FROM shopperinfo WHERE shopperID = '$shopperID'";

            $result = mysqli_query($conn,$sql2);

            while($row3 = mysqli_fetch_array($result)) {
              echo "<td>".$row3['shopperFname']."</td>";
           
              echo "<td>".$row3['shopperSname']."</td>";
            }

            echo "<td>".$row['deliveryStatus']."</td>";       
            echo "<td><button style='margin:5px' type='button' class='btn btn-success btn-block'><a style='text-decoration: none; color: white;' href=\"../php/trpAgentConfirmation.php?id=$row[dispatchID]\">Confirm Order Delivery</a></button> 
            <button style='margin:5px' type='button' class='btn btn-danger btn-block center-blocks'><a style='text-decoration: none; color: white;' href=\"../php/trpAgentCancellation.php?id=$row[dispatchID]\" onClick=\"return confirm('Are you sure you want to cancel the order placed by the client?')\">Cancel Order</a></button></td>";
            echo "</tr>";   
          }
        ?>
      </table>
  </div>  

      <!-- Footer -->

  
</body>
</html>