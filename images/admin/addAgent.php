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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard  <small>User Management</small></h1>
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
              <h3 style="text-align: center;" class="panel-title">Transport Agent Registration</h3>
            </div>
            <div class="panel-body">

              <br>
      

  <h2></h2>

  <form action="../php/trpAgentReg.php" method="POST">
    <fieldset>

    <div class="form-group col-md-4 col-sm-4">
      <label for="fName">First Name:</label>
      <input type="text" class="form-control" id="fName" name="fName">
    </div>

    <div class="form-group col-md-4 col-sm-4">
      <label for="sName">Second Name:</label>
      <input type="text" class="form-control" id="sName" name="sName">
    </div>

    <div class="form-group col-md-4 col-sm-4">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>

    <div class="form-group col-md-8 col-sm-8">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group col-md-4 col-sm-4">
      <label for="phone">Phone Number:</label>
      <input type="text" class="form-control" id="phone" name="phone">
    </div>

  <div class="form-group col-md-4 col-sm-4">
      <label for="county">County:</label>
      <input list="county" class="form-control" name="county" id="county" required title="Enter your county of residence">
      <datalist id="county">
          <option value="Baringo">
          <option value="Bomet">
          <option value="Bungoma">
          <option value="Busia">
          <option value="Elgeyo Marakwet">
          <option value="Embu">
          <option value="Garissa">
          <option value="Homabay">
          <option value="Isiolo">
          <option value="Kajiado">
          <option value="Kakamega">
          <option value="Kericho">
          <option value="Kiambu">
          <option value="Kilifi">
          <option value="Kirinyaga">
          <option value="Kisii">
          <option value="Kisumu">
          <option value="Kitui">
          <option value="Kwale">
          <option value="Laikipia">
          <option value="Lamu">
          <option value="Machakos">
          <option value="Makueni">
          <option value="Mandera">
          <option value="Meru">
          <option value="Migori">
          <option value="Marsabit">
          <option value="Mombasa">
          <option value="Muranga">
          <option value="Nairobi">
          <option value="Naivasha">
          <option value="Nakuru">
          <option value="Nandi">
          <option value="Narok">
          <option value="Nyamira">
          <option value="Nyandarua">
          <option value="Nyeri">
          <option value="Samburu">
          <option value="Siaya">
          <option value="Taita Taveta">
          <option value="Tana River">
          <option value="Tharaka Nithi">
          <option value="Trans Nzoia">
          <option value="Turkana">
          <option value="Uasin Gishu">
          <option value="Vihiga">
          <option value="Wajir">
          <option value="West Pokot">
      </datalist>
  </div>

    <div class="form-group col-md-4 col-sm-4">
        <label for="constituency">Constituency:</label>
        <input list="constituency" class="form-control" id="constituency" name="constituency" required title="enter your constiturncy of residence">
        <datalist id="constituency">
            <option value="Baringo East">
            <option value="Baringo West">
            <option value="Baringo central">
            <option value="Mochongoi">
            <option value="Mogotio">
            <option value="Eldama Ravine">
            <option value="Mt Elgon">
            <option value="Sirisia">
            <option value="Kabuchia">
            <option value="Bumula">
            <option value="Kandunyi">
            <option value="Webuye">
            <option value="Bokoli">
            <option value="Kimilili">
            <option value="Tongaren">
            <option value="Sotik">
            <option value="Chepalungu">
            <option value="Bomet East">
            <option value="Bomet Central">
            <option value="Konoin">
            <option value="Teso North">
            <option value="Teso South">
            <option value="Nambale">
            <option value="Matayos">
            <option value="Butula">
            <option value="Funyula">
            <option value="Budalangi">
            <option value="Marakwet East">
            <option value="Marakwet West">
            <option value="Keiyo East">
            <option value="Keiyo South">
            <option value="Manyatta">
            <option value="Runyenjes">
            <option value="Gachoka">
            <option value="Siakago">
            <option value="TaveDujis">
            <option value="Balambala">
            <option value="Lagdera">
            <option value="Daadad">
            <option value="Fafi">
            <option value="Ijara">
            <option value="Kasipul Kabondo">
            <option value="Karachuonyo">
            <option value="Rangwe">
            <option value="Homabay Town">
            <option value="Dhiwa">
            <option value="Mbita">
            <option value="Gwasii">
            <option value="Isiolo North">
            <option value="Isiolo South">
            <option value="Lugari">
            <option value="likuyani">
            <option value="Malava">
            <option value="Lurambi">
            <option value="Makholo">
            <option value="Mumias">
            <option value="Mumias East">
            <option value="Matungu">
            <option value="Butere">
            <option value="Khwisero">
            <option value="Shinyalu">
            <option value="Ikolomani">
            <option value="Navakholo">
            <option value="Ainamoi">
            <option value="Belgut">
            <option value="Kipkelion">
            <option value="Gatundu South">
            <option value="Gatundu North">
            <option value="Juja">
            <option value="Thika Town">
            <option value="Ruiru">
            <option value="Githunguri">
            <option value="Kiambu">
            <option value="Kiambaa">
            <option value="Kabete">
            <option value="Kikuyu">
            <option value="Limuru">
            <option value="Lari">
            <option value="Kilifi North">
            <option value="Kilifi South">
            <option value="Kaloleni">
            <option value="Rabai">
            <option value="Ganze">
            <option value="Kitui Town">
            <option value="Mutitu">
            <option value="Kitui South">
            <option value="Msambweni">
            <option value="Lunga Lunga">
            <option value="Matuga">
            <option value="Kinango">
            <option value="Laikipia West">
            <option value="Laikipia North">
            <option value="Laikipia East">
            <option value="Lamu East">
            <option value="Lamu West">
            <option value="Masinga">
            <option value="Yatta">
            <option value="Kangundo">
            <option value="Matungulu">
            <option value="Kathiani">
            <option value="Mavoko">
            <option value="Machakos Town">
            <option value="Mwala">
            <option value="Mbooni">
            <option value="Kilome">
            <option value="Kaiti">
            <option value="Makueni">
            <option value="Kibwezi West">
            <option value="Kibwezi East">
            <option value="Mandera West">
            <option value="Mandera South">
            <option value="Lafey">
            <option value="Moyale">
            <option value="North Horr">
            <option value="Saku">
            <option value="Laisamis">
            <option value="Igembe South">
            <option value="Igembe Central">
            <option value="Igembe North">
            <option value="Tigania West">
            <option value="Tigania East">
            <option value="North Imenti">
            <option value="South Imenti">
            <option value="Rongo">
            <option value="Awendo">
            <option value="Migori East">
            <option value="Migori West">
            <option value="Uriri">
            <option value="Nyatike">
            <option value="Kuria East">
            <option value="Kuria West">
            <option value="Changamwe">
            <option value="Jomvu">
            <option value="kisauni">
            <option value="Nyali">
            <option value="Likoni">
            <option value="Mvita">
            <option value="Kwale">
            <option value="Kangema">
            <option value="Mathioya">
            <option value="Kiharu">
            <option value="Kigumo">
            <option value="Maragwa">
            <option value="Kandara">
            <option value="Gatanga">
            <option value="Weastlands">
            <option value="Parklands">
            <option value="Dagoretti">
            <option value="Karen">
            <option value="Langata">
            <option value="Kibra">
            <option value="Roysambu">
            <option value="Kasarani">
            <option value="Ruaraka">
            <option value="Karionangi">
            <option value="Kayole">
            <option value="Embakasi">
            <option value="Mihango">
            <option value="Nairobi West">
            <option value="Makadara">
            <option value="Kamukunji">
            <option value="Starehe">
            <option value="Mathare">
            <option value="Molo">
            <option value="Njoro">
            <option value="Naivasha">
            <option value="Gilgil">
            <option value="Kuresoi South">
            <option value="Kuresoi North">
            <option value="Subukia">
            <option value="Rongai">
            <option value="Bahati">
            <option value="Nakuru Town West">
            <option value="Nakuru Town East">
            <option value="Tinderet">
            <option value="Aldai">
            <option value="Nandi Hills">
            <option value="Emgewen North">
            <option value="Emgwen South">
            <option value="Mosop">
            <option value="Kilgoris">
            <option value="Emurua Dikirr">
            <option value="Narok North">
            <option value="Kajiado East">
            <option value="Kajiado West">
            <option value="Kitutu Masaba">
            <option value="North Mugirango">
            <option value="West Mugirango">
            <option value="Kinangop">
            <option value="Kipipiri">
            <option value="Ol-Kalou">
            <option value="Ol-Jororok">
            <option value="Ndaragwa">
            <option value="Tetu">
            <option value="Kieni">
            <option value="Mathira">
            <option value="Othaya">
            <option value="Mukurwe-Ini">
            <option value="Nyeri Town">
            <option value="Samburu West">
            <option value="Samburu North">
            <option value="Samburu East">
            <option value="Ugenya">
            <option value="Ugunja">
            <option value="Alego">
            <option value="Usonga">
            <option value="Gem">
            <option value="Bondo">
            <option value="Rarieda">
            <option value="Tavete">
            <option value="Wundanyi">
            <option value="Mwatate">
            <option value="Voi">
            <option value="Garsen">
            <option value="Galole">
            <option value="Bura">
            <option value="Niithi">
            <option value="Maara">
            <option value="Tharaka">
            <option value="Kwanza">
            <option value="Endebess">
            <option value="Saboti">
            <option value="Kiminini">
            <option value="Cherenganyi">
            <option value="Turkana North">
            <option value="Turkana West">
            <option value="Turkana Central">
            <option value="Turkana East">
            <option value="Turkana South">
            <option value="Loima">
            <option value="Eldoret East">
            <option value="Eldoret North">
            <option value="Eldoret South">
            <option value="Vihiga">
            <option value="Sabatia">
            <option value="Hamisi">
            <option value="Emuhaya">
            <option value="Luanda">
            <option value="Wajir North">
            <option value="Wajir East">
            <option value="Tarbaj">
            <option value="Wajir West">
            <option value="Eldas">
            <option value="Wajir South">
            <option value="Kapenguria">
            <option value="Sigor">
            <option value="Kacheliba">
            <option value="Pokot South">
        </datalist>
    </div>

    <div class="clearfix"></div>

    <div class="form-group col-sm-4 col-md-4">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" onkeyup='check()';>
      <h4><span id='message'></span></h4>
    </div>

    <div class="form-group col-sm-4 col-md-4">
      <label for="password2">Confirm Password:</label>
      <input type="password" class="form-control" id="password2" name="password2" onkeyup='check()';>
      <h4><span id='message'></span></h4>
    </div>

    <div class="clearfix"></div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary btn-block">Submit
    </div>

    </button>
    </fieldset>

    
</form>
<script type="text/javascript">
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('password2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
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