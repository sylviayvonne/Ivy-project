<?php
	$servername = "localhost";
  	$username = "root";
  	$password = "";
  	$dbname = "ivyproject";

  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);

  	$sql = "SELECT * FROM shopperinfo";

  	if ($result = mysqli_query($conn, $sql))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result);

    	$shoppers = $row_cnt;
    	mysqli_free_result($result);
	}

	$sql1 = "SELECT * FROM designerinfo";

  	if ($result1 = mysqli_query($conn, $sql1))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result1);

    	$designers = $row_cnt;
    	mysqli_free_result($result1);
	}

	$sql2 = "SELECT * FROM trpagentinfo";

  	if ($result2 = mysqli_query($conn, $sql2))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result2);

    	$agents = $row_cnt;
    	mysqli_free_result($result2);
	}

	$sql3 = "SELECT * FROM orders";

  	if ($result3 = mysqli_query($conn, $sql3))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result3);

    	$orders = $row_cnt;
    	mysqli_free_result($result3);
	}

	$sql4 = "SELECT * FROM dispatch";

  	if ($result4 = mysqli_query($conn, $sql4))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result4);

    	$dispatch = $row_cnt;
    	mysqli_free_result($result4);
	}

	$sql5 = "SELECT * FROM wages";

  	if ($result5 = mysqli_query($conn, $sql5))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result5);

    	$wages = $row_cnt;
    	mysqli_free_result($result5);
	}

	$sql6 = "SELECT * FROM dispatch";

  	if ($result6 = mysqli_query($conn, $sql6))
  	{

    	/* determine number of rows result set */
    	$row_cnt = mysqli_num_rows($result6);

    	$refunds = $row_cnt;
    	mysqli_free_result($result6);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Area | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Ivy Designs</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="shoppers.php">Shoppers</a></li>
            <li><a href="designers.php">Designers</a></li>
            <li><a href="transporters.php">Transporters</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="dispatches.php">Dispatches</a></li>
            <li><a href="wages.php">Wages</a></li>
            <li><a href="refunds.php">Refunds</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Welcome, Yvonne</a></li>
            <li><a href="pages.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-10">
    				<h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard  <small>Site Management</small></h1>
    			</div>
    			<div class="col-md-2">
    				<div class="dropdown create">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Create Content
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					    <li><a href="addShopper.php">Add Shopper</a></li>
              			<li><a href="addDesigner.php">Add Designer</a></li>
              			<li><a href="addShopper.php">Add Transport Agent</a></li>
					  </ul>
					</div>	
    			</div>
    		</div>
    	</div>	
    </header>

    <section id="breadcrumb">
    	<div class="container">
    		<ol class="breadcrumb">
    			<li class="active">Dashboard</li>
    		</ol>
    	</div>
    </section>

    <section id="main">
    	<div class="container">
    		<div class="row">

    			<!--sidebar-->
    			<div class="col-md-3">
    				<div class="list-group">
					  <a href="#" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 
					    Dashboard
					  </a>
					  <a href="shoppers.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Shoppers <span class="badge"><?php echo $shoppers; ?></span></a>
					  <a href="#designers.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Designers <span class="badge"><?php echo $designers; ?></span></a>
					  <a href="transporters.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Transporters <span class="badge"><?php echo $agents; ?></span></a>
					  <a href="orders.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Orders <span class="badge"><?php echo $orders; ?></span></a>
					  <a href="dispatches.php" class="list-group-item"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Dispatches <span class="badge"><?php echo $dispatch; ?></span></a>
					  <a href="wages.php" class="list-group-item"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Wages <span class="badge"><?php echo $wages; ?></span></a>
					  <a href="refunds.php" class="list-group-item"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Refunds <span class="badge"><?php echo $refunds; ?></span></a>
					</div> 

					<div class="well">
						<h3>Financial Analysis</h3>
	    				<h4>Sales</h4>
	    				<div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						    60%
						  </div>
						</div>

						<h4>Refunds</h4>
						<div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						    60%
						  </div>
						</div>
	    				
	    			</div>
    			</div>


    			<!--main area-->
    			<div class="col-md-9">
    				<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
					    <h3 style="text-align: center;" class="panel-title">System Overview</h3>
					  </div>
					  <div class="panel-body">
					  	<div class="col-md-4">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 12</h2>
						    	<h4>Shoppers</h4>					    	
						    </div>
						</div>
						<div class="col-md-4"> 
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 12</h2>
						    	<h4>Designers</h4>					    	
						    </div>
						</div>
						<div class="col-md-4">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 12</h2>
						    	<h4>Transporters</h4>					    	
						    </div>
						</div>
						<div class="col-md-3">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> 12</h2>
						    	<h4>Orders</h4>					    	
						    </div>
						</div>
						<div class="col-md-3">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-send" aria-hidden="true"></span> 12</h2>
						    	<h4>Dispatches</h4>					    	
						    </div>
						</div>
						<div class="col-md-3">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> 12</h2>
						    	<h4>Wages</h4>					    	
						    </div>
						</div>
						<div class="col-md-3">
						    <div class="well dash-box">
						    	<h2><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 12</h2>
						    	<h4>Refunds</h4>					    	
						    </div>
						</div>
					  </div>
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
					    <h3 style="text-align: center;" class="panel-title">Shoppers</h3>
					  </div>
					  <div class="panel-body">

					    <div class="table-wrapper-scroll-y">

						  <table class="table table-bordered table-striped">
						    <thead>
						      <tr>
						        <th scope="col">#</th>
						        <th scope="col">First</th>
						        <th scope="col">Last</th>
						        <th scope="col">Handle</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <th scope="row">1</th>
						        <td>Mark</td>
						        <td>Otto</td>
						        <td>@mdo</td>
						      </tr>
						      <tr>
						        <th scope="row">2</th>
						        <td>Jacob</td>
						        <td>Thornton</td>
						        <td>@fat</td>
						      </tr>
						      <tr>
						        <th scope="row">3</th>
						        <td>Larry</td>
						        <td>the Bird</td>
						        <td>@twitter</td>
						      </tr>
						      <tr>
						        <th scope="row">4</th>
						        <td>Mark</td>
						        <td>Otto</td>
						        <td>@mdo</td>
						      </tr>
						      <tr>
						        <th scope="row">5</th>
						        <td>Jacob</td>
						        <td>Thornton</td>
						        <td>@fat</td>
						      </tr>
						      <tr>
						        <th scope="row">6</th>
						        <td>Larry</td>
						        <td>the Bird</td>
						        <td>@twitter</td>
						      </tr>
						      <tr>
						        <th scope="row">1</th>
						        <td>Mark</td>
						        <td>Otto</td>
						        <td>@mdo</td>
						      </tr>
						      <tr>
						        <th scope="row">2</th>
						        <td>Jacob</td>
						        <td>Thornton</td>
						        <td>@fat</td>
						      </tr>
						      <tr>
						        <th scope="row">3</th>
						        <td>Larry</td>
						        <td>the Bird</td>
						        <td>@twitter</td>
						      </tr>
						      <tr>
						        <th scope="row">4</th>
						        <td>Mark</td>
						        <td>Otto</td>
						        <td>@mdo</td>
						      </tr>
						      <tr>
						        <th scope="row">5</th>
						        <td>Jacob</td>
						        <td>Thornton</td>
						        <td>@fat</td>
						      </tr>
						      <tr>
						        <th scope="row">6</th>
						        <td>Larry</td>
						        <td>the Bird</td>
						        <td>@twitter</td>
						      </tr>
						    </tbody>
						  </table>

						</div>

					  </div>
					</div>				
    			</div>
    			
    		</div>
    		
    	</div>
    	
    </section>

   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/table.js"></script>
   
  </body>
</html>