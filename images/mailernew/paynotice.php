<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

session_start();
  //gives variable for creating the connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ivyproject";
echo $ID = $_SESSION['payID'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
else
{
    $sql = "SELECT * FROM orders WHERE orderID='$ID'";

    $result = mysqli_query($conn,$sql);

    if (mysqli_query($conn, $sql)) 
    {
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

        if(mysqli_query($conn, $sql2))
        {
            echo 'got designer';

            $rowDes = mysqli_fetch_array($result2);

            echo $desFname = $rowDes['designerFname'];
            echo $desSname = $rowDes['designerSname'];
            echo $desEmail = $rowDes['designerEmail'];
        }

        $sql3 = "SELECT shopperFname, shopperSname, shopperEmail, shopperPhonenumber FROM shopperinfo WHERE shopperID = '$shopID'";

        $result3 = mysqli_query($conn, $sql3);

        if(mysqli_query($conn, $sql3))
        {
            echo 'got shopper';

            $rowShop = mysqli_fetch_array($result3);

            echo $shopFname = $rowShop['shopperFname'];
            echo $shopSname = $rowShop['shopperSname'];
            echo $shopEmail = $rowShop['shopperEmail'];
            echo $shopPhone = $rowShop['shopperPhonenumber'];
        }

        $mailtodesigner = "<br>Dear $desFname $desSname, this is to notify you of your new cloth order from $shopFname $shopSname for the cloth under your collection called $cName for the price $cPrice. Kinldly complete this order. You may also contact $shopFname using the phone number $shopPhone for any customizations on the cloth.<br>Regards<br>
        Ivy Designs.";
        $mailtoshopper ="<br>Dear $shopFname,<br>This is to confirm that your cloth order has been received and is being processes by $desFname $desSname. The payment of ksh.$cPrice has also been Successfully received and will there only be forwarded to the paid out to the rightful individual upon the Successfull completion of your order.<br><br>Regards<br>Ivy Designs.";  
         
    }
    else 
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try 
{
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ivydesigns20@gmail.com';                 // SMTP username
    $mail->Password = 'ivysylvia';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ivydesigns20@gmail.com', 'Ivy Designs');
    $mail->addAddress($desEmail);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //$bodyofemail = 'This is the HTML message body <b>in bold!</b>';

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Clothing Order';
    $mail->Body    = $mailtodesigner;
    $mail->AltBody = strip_tags($mailtodesigner);

    if($mail->send())
    {
       echo 'Message has been sent';
       //header("location: ../html/shoppingCart.php");
       //echo '<script type="text/javascript">window.location = "../html/shoppingCart.php"</script>';

        //new email to shopper
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try 
        {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'ivydesigns20@gmail.com';                 // SMTP username
            $mail->Password = 'ivysylvia';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('ivydesigns20@gmail.com', 'Ivy Designs');
            $mail->addAddress($shopEmail);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //$bodyofemail = 'This is the HTML message body <b>in bold!</b>';

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Cloth Order Successfully Received';
            $mail->Body    = $mailtoshopper;
            $mail->AltBody = strip_tags($mailtoshopper);

            if($mail->send()){
               echo 'Message has been sent';
               //header("location: ../html/shoppingCart.php");
               echo '<script type="text/javascript">window.location = "../html/shoppingCart.php"</script>'; 
            }
        } 
        catch (Exception $e) 
        {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        } 
    }
} 
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>