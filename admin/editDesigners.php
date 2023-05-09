<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  $id = $_GET['id'];

  //items in shopping cart
  $items = '';

  $sql = "SELECT * FROM designerinfo";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

$sql2 = "SELECT * FROM designerinfo WHERE designerID=$id";
$result2 =mysqli_query($conn,$sql2);
while($res = mysqli_fetch_array($result2))
{
  $designerID = $res['designerID'];
  $designerFname = $res['designerFname'];
  $designerSname = $res['designerSname'];
  $designerUsername = $res['designerUsername'];
  $designerEmail = $res['designerEmail'];
  $designerPhonenumber = $res['designerPhonenumber'];
  $designerCounty = $res['designerCounty'];
  $designerConstituency = $res['designerConstituency'];
  $designerPassword = $res['designerPassword']; 
}

?>

<?php
  if(isset($_POST['update']))
  { 

    
    $designerID = trim($_POST['designerID']);
    $designerFname = trim($_POST['designerFname']);
    $designerSname = trim($_POST['designerSname']);
    $designerUsername = trim($_POST['designerUsername']);
    $designerEmail = trim($_POST['designerEmail']);
    $designerPhonenumber = trim($_POST['designerPhonenumber']);
    $designerCounty = trim($_POST['designerCounty']);
    $designerConstituency = trim($_POST['designerConstituency']);
    $designerPassword = md5($_POST['designerPassword']);
    
      $sql2 = "UPDATE designerinfo SET designerID='$designerID', designerFname='$designerFname', designerSname='$designerSname', designerUsername='$designerUsername', designerEmail='$designerEmail', designerPhonenumber='$designerPhonenumber', designerCounty='$designerCounty', designerConstituency ='$designerConstituency', designerPassword='$designerPassword' WHERE designerID=$id";

      if(mysqli_query($conn,$sql2)==TRUE){
      //redirectig to the display page. In our case, it is index.php
      //echo "update was successful"; 
      header("Location: designers.php");
    }else{
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
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

    <style type="text/css">
    .error{
    color:red;
    font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
    font-size:16px;
  }
  table {
    font-family: arial, sans-serif !important;
    border-collapse: collapse !important;
    width: 100% !important;
}

td, th {
    border: 1px solid #dddddd !important;
    text-align: center !important;
    padding: 8px !important;
    text-align: center !important;

}

tr:nth-child(even) {
    background-color: #dddddd !important;
}
  </style>

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
            <li><a href="shoppers.php">designers</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard  <small>Dispatch Management</small></h1>
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
          <!--main area-->
          <div class="col-md-12">

          

          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 style="text-align: center;" class="panel-title">Edit designer Information</h3>
            </div>
            <div class="panel-body">
              <div style="text-align: center;" class="container">
                <form name="form1" method="post" action="">
                  <table border="0">
                    <tr> 
                      <td>Client ID</td>
                      <td><input type="text" name="designerID" readonly value="<?php echo $designerID;?>"></td>
                    </tr>
                  
                    <tr> 
                      <td>First Name</td>
                      <td><input type="text" name="designerFname" required value="<?php echo $designerFname;?>"></td>
                    </tr>
                    <tr> 
                      <td>Last Name</td>
                      <td><input type="text" name="designerSname"  required value="<?php echo $designerSname;?>"></td>
                    </tr>
                    <tr> 
                      <td>Username</td>
                      <td><input type="text" name="designerUsername" required value="<?php echo $designerUsername;?>"></td>
                    </tr>
                    <tr> 
                      <td>E-mail</td>
                      <td><input type="text" name="designerEmail" required value="<?php echo $designerEmail;?>"></td>
                    </tr>
                    <tr> 
                      <td>Phone</td>
                      <td><input type="text" name="designerPhonenumber" required value="<?php echo $designerPhonenumber;?>"></td>
                    </tr>
                    <tr> 
                      <td>County</td>
                      <td><input type="text" name="designerCounty" required value="<?php echo $designerCounty;?>"></td>
                    </tr>
                    <tr> 
                      <td>Constituency</td>
                      <td><input type="text" name="designerConstituency" required value="<?php echo $designerConstituency;?>"></td>
                    </tr>
                    <tr> 
                      <td>Password</td>
                      <td><input type="text" name="designerPassword" required value="<?php echo $designerPassword;?>"></td>
                    </tr>
                    <tr>
                      <!--<td><input type="hidden" name="id" value=<?php //echo $_GET['id'];?>></td>-->
                      <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                  </table>
                </form>
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