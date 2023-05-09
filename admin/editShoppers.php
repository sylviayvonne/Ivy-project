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

  $sql = "SELECT * FROM shopperinfo";

  if ($result = mysqli_query($conn, $sql)){

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    $items = $row_cnt;

    //printf("Result set has %d rows.\n", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

$sql2 = "SELECT * FROM shopperinfo WHERE shopperID=$id";
$result2 =mysqli_query($conn,$sql2);
while($res = mysqli_fetch_array($result2))
{
  $shopperID = $res['shopperID'];
  $shopperFname = $res['shopperFname'];
  $shopperSname = $res['shopperSname'];
  $shopperUsername = $res['shopperUsername'];
  $shopperEmail = $res['shopperEmail'];
  $shopperPhonenumber = $res['shopperPhonenumber'];
  $shopperCounty = $res['shopperCounty'];
  $shopperConstituency = $res['shopperConstituency'];
  $shopperPassword = $res['shopperPassword']; 
}

?>

<?php
  if(isset($_POST['update']))
  { 

    
    $shopperID = trim($_POST['shopperID']);
    $shopperFname = trim($_POST['shopperFname']);
    $shopperSname = trim($_POST['shopperSname']);
    $shopperUsername = trim($_POST['shopperUsername']);
    $shopperEmail = trim($_POST['shopperEmail']);
    $shopperPhonenumber = trim($_POST['shopperPhonenumber']);
    $shopperCounty = trim($_POST['shopperCounty']);
    $shopperConstituency = trim($_POST['shopperConstituency']);
    $shopperPassword = md5($_POST['shopperPassword']);
    
      $sql2 = "UPDATE shopperinfo SET shopperID='$shopperID', shopperFname='$shopperFname', shopperSname='$shopperSname', shopperUsername='$shopperUsername', shopperEmail='$shopperEmail', shopperPhonenumber='$shopperPhonenumber', shopperCounty='$shopperCounty', shopperConstituency ='$shopperConstituency', shopperPassword='$shopperPassword' WHERE shopperID=$id";

      if(mysqli_query($conn,$sql2)==TRUE){
      //redirectig to the display page. In our case, it is index.php
      //echo "update was successful"; 
      header("Location: shoppers.php");
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
              <li><a href="addShopper.php">Add Transport Agent</a></li>            </ul>
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
              <h3 style="text-align: center;" class="panel-title">Edit Shopper Information</h3>
            </div>
            <div class="panel-body">
              <div style="text-align: center;" class="container">
                <form name="form1" method="post" action="">
                  <table border="0">
                    <tr> 
                      <td>Client ID</td>
                      <td><input type="text" name="shopperID" readonly value="<?php echo $shopperID;?>"></td>
                    </tr>
                  
                    <tr> 
                      <td>First Name</td>
                      <td><input type="text" name="shopperFname" required value="<?php echo $shopperFname;?>"></td>
                    </tr>
                    <tr> 
                      <td>Last Name</td>
                      <td><input type="text" name="shopperSname"  required value="<?php echo $shopperSname;?>"></td>
                    </tr>
                    <tr> 
                      <td>Username</td>
                      <td><input type="text" name="shopperUsername" required value="<?php echo $shopperUsername;?>"></td>
                    </tr>
                    <tr> 
                      <td>E-mail</td>
                      <td><input type="text" name="shopperEmail" required value="<?php echo $shopperEmail;?>"></td>
                    </tr>
                    <tr> 
                      <td>Phone</td>
                      <td><input type="text" name="shopperPhonenumber" required value="<?php echo $shopperPhonenumber;?>"></td>
                    </tr>
                    <tr> 
                      <td>County</td>
                      <td><input type="text" name="shopperCounty" required value="<?php echo $shopperCounty;?>"></td>
                    </tr>
                    <tr> 
                      <td>Constituency</td>
                      <td><input type="text" name="shopperConstituency" required value="<?php echo $shopperConstituency;?>"></td>
                    </tr>
                    <tr> 
                      <td>Password</td>
                      <td><input type="text" name="shopperPassword" required value="<?php echo $shopperPassword;?>"></td>
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