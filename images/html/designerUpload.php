<?php
	session_start();
	echo 'time to upload goods';

	$designerID = $_SESSION['designerID'];
  $login_user = $_SESSION['designerUsername'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cloth Upload</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/home.css" rel="stylesheet" type="text/css">
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Uploads</a></li>
              <li><a href="#">Orders and Confirmations</a></li>
            </ul>

            <!--links for navbar on the right-->
            <ul class="nav navbar-nav navbar-right">
              <li><a title = "click to views your profile" href="#"><span class="glyphicon glyphicon-user"></span><span class="userloggedin"><strong> <?php echo $login_user;?></strong></span><span ></span></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout<span></span></a></li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <br>
      <br>

      <form action="../php/clothUpload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend style="text-align: center;">Designer Cloth Upload</legend>
          <div class="form-group col-sm-4 col-md-4">
          <label for="name">Cloth Name:</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div>
          <input type="hidden" name="size" value="1000000">
        </div>

        <div class="form-group col-md-4 col-sm-4">
          <label for="category">Category:</label>
          <select name="category" id="category" class="form-control">
            <option value="men">Men</option>
            <option value="women">Women</option>
            <option value="kids">Kids</option>
            <option value="couples">Couples</option>
          </select>
        </div>

        <div class="form-group col-sm-4 col-md-4">
          <label for="price">Price:</label>
          <input type="text" class="form-control" id="price" name="price">
        </div>

        <div class="form-group col-sm-4 col-md-4">
          <label for="image">Image:</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group col-md-8 col-sm-8">
          <label for="description">Description:</label>
          <textarea class="form-control" name="description" cols="40" rows="4" placeholder="say something about the cloth" id="description"></textarea>
        </div>

        <div class="clearfix"></div>


        <div class="clearfix"></div>

        <div class="text-center">
          <button type="submit" name="upload" class="btn btn-primary btn-block">Upload</button>
        </div>

        </fieldset>
      </form>

      



      	<footer class=" site-footer navbar navbar-fixed-bottom navbar-default container-fluid">
		    <div id="theContent">
		        <div class="col-md-3 col-sm-3">

		        </div>
		        <div class="gridInfo col-md-6 col-sm-6">
		            <h5>Help & support</h5>
		            <ul >
		                <li><a href="#">Home</a></li>
		                <li><a href="#">About Us</a></li>
		                <li><a href="#">Contact US</a></li>
		            </ul>
		        </div>

		        <div class="gridInfo col-md-3 col-sm-3">
		            <h5>Social Media</h5>
		            <ul>
						<li><img src="../icons/Facebook_32.png"></span></li>
						<li><img src="../icons/Twitter_32.png"></span></li>
					<ul>
		        </div>
		    </div>
		</footer>
</div>
</div>
</body>
</html>