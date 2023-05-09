<?php
session_start();
echo 'order was successful';
echo '<br>';

echo $finalOrderID = $_SESSION['finalOrderID'];
echo '<br>';
echo $finaldesignerID = $_SESSION['finaldesignerID'];
echo '<br>';
echo $finalAgentWage = $_SESSION['finalAgentWage'];
echo '<br>';
echo $finaldesignerWage = $_SESSION['finaldesignerWage'];
echo '<br>';

echo $agentFname = $_SESSION['agentFname'];
echo $agentSname = $_SESSION['agentSname'];
echo $agentEmail = $_SESSION['agentEmail'];
echo $agentPhonenumber = $_SESSION['agentPhonenumber'];
echo '<br>';

echo $desFname = $_SESSION['desFname'];
echo $desSname = $_SESSION['desSname'];
echo $desEmail = $_SESSION['desEmail'];
echo $desPhonenumber = $_SESSION['desPhonenumber'];
echo '<br>';

echo $shopFname = $_SESSION['shopFname'];
echo $shopSname = $_SESSION['shopSname'];
echo $shopEmail = $_SESSION['shopEmail'];
echo '<br>';

$jobson = 'jobokello5@gmail.com';
$jack = 'jacknovak254@gmail.com';
$ivy = 'sylviayvonne65@gmail.com';

$shopperMessage = "Dear $shopFname $shopSname,<br>This is to notify you of the delivery of your order number $finalOrderID by $agentFname $agentSname today. Kindly log in to your account and confirm delivery.<br>Kind Regards<br>Ivy Designs.<br>";
$agentMessage = "Dear $agentFname $agentSname,<br> This is to notify you that we have acknowledged your order delivery nad we will begin procesing your payment of ksh. $finalAgentWage as soon as possible to the phone number $agentPhonenumber.<br>Kind Regards<br>Ivy Designs<br>.";
$designerMessage = "Dear $desFname $desSname,<br> This is to notify of the successful delivery of the cloth order by the delivery agent $agentFname $agentSname. We will begin procesing your payment of ksh. $finaldesignerWage as soon as possible to the phone number $desPhonenumber.<br>Kind Regards<br>Ivy Designs<br>.";


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';





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

    $bodyofemail = 'This is the HTML message body <b>in bold!</b>';

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirm Delivery';
    $mail->Body    = $shopperMessage;
    $mail->AltBody = strip_tags($shopperMessage);

    if($mail->send()){
       echo 'Message has been sent';
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
            $mail->addAddress($agentEmail);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            $bodyofemail = 'This is the HTML message body <b>in bold!</b>';

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Delivery Acknowledged';
            $mail->Body    = $agentMessage;
            $mail->AltBody = strip_tags($agentMessage);

            if($mail->send()){
               echo 'Message has been sent';
               //header("location: ../html/shoppingCart.php");
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

                    $bodyofemail = 'This is the HTML message body <b>in bold!</b>';

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Successful Delivery';
                    $mail->Body    = $designerMessage;
                    $mail->AltBody = strip_tags($designerMessage);

                    if($mail->send()){
                       echo 'Message has been sent';
                       //header("location: ../html/shoppingCart.php");
                       echo '<script type="text/javascript">window.location = "../html/trpAgentOrders.php"</script>';
 
                    }
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                } 
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
       //header("location: ../html/shoppingCart.php"); 
    }
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>