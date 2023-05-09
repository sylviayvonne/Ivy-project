<?php
 require '../mailer/PHPMailerAutoload.php';
 session_start();
  //gives variable for creating the connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ivyproject";
  echo $ID = $_SESSION['payID'];
  


  $error;

  // Create connection
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
  if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
  }else{
  	$sql = "SELECT * FROM orders WHERE orderID='$ID'";

  	$result = mysqli_query($conn,$sql);

	if (mysqli_query($conn, $sql)) {
    echo "update success!!!";
    $row = mysqli_fetch_array($result);

   	echo $order = $row['orderID'];
   	echo $cID = $row['clothID'];
   	echo $cName = $row['clothName'];
   	echo $cDesc = $row['clothDescription'];
   	echo $cPrice = $row['orderPrice'];
   	echo $shopID = $row['shopperID']; 
   	echo $desID = $row['designerID'];

   	$sql2 = "SELECT designerFname, designerSname, designerEmail FROM designerinfo WHERE designerID = '$desID'";

   	$result2 = mysqli_query($conn, $sql2);

   	if(mysqli_query($conn, $sql2)){
   		echo 'got designer';

   		$rowDes = mysqli_fetch_array($result2);

   		echo $desFname = $rowDes['designerFname'];
   		echo $desSname = $rowDes['designerSname'];
   		echo $desEmail = $rowDes['designerEmail'];
   	}

   	$sql3 = "SELECT shopperFname, shopperSname, shopperEmail, shopperPhonenumber FROM shopperinfo WHERE shopperID = '$shopID'";

   	$result3 = mysqli_query($conn, $sql3);

   	if(mysqli_query($conn, $sql3)){
   		echo 'got shopper';

   		$rowShop = mysqli_fetch_array($result3);

   		echo $shopFname = $rowShop['shopperFname'];
   		echo $shopSname = $rowShop['shopperSname'];
   		echo $shopEmail = $rowShop['shopperEmail'];
   		echo $shopPhone = $rowShop['shopperPhonenumber'];
   	}

    $mailbody = "<br>Dear $desFname $desSname, this is to notify you of your new cloth order from $shopFname $shopSname for the cloth under your collection called $cName for the price $cPrice. Kinldly complete this order. You may also contact $shopPhone using the phone number $shopPhone for any customizations on the cloth.<br>Regards<br>
    Ivy Designs.";

   		$mail = new PHPMailer;

		$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ivydesigns20@gmail.com';                 // SMTP username
		$mail->Password = 'ivysylvia';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('ivydesigns20@gmail.com', 'Ivy Designs');
		$mail->addAddress('jobokello5@gmail.com');     // Add a recipient
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'New Order Received';
		$mail->Body    =  $mailbody;
		$mail->AltBody = strip_tags($mailbody);

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    //echo 'Message has been sent';
		    header('location: ../html/shoppingCart.php');
		}
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
  }

?>

