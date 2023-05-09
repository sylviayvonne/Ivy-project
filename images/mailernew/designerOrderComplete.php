<?php
    session_start();
    echo '<br>';
    echo $shopperID = $_SESSION['shopperID'];
    echo '<br>';
    echo $designerID = $_SESSION['designerID'];
    echo '<br>';
    echo $agentID = $_SESSION['agentID'];
    echo '<br>';
    echo $orderID = $_SESSION['orderID'];
    echo '<br>';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ivyproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check  whether the connection was successful
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
    //order information
    $sql1 = "SELECT * FROM orders WHERE orderID = '$orderID'";

    $result1 = mysqli_query($conn,$sql1);

    if (mysqli_query($conn, $sql1)) 
    {
        echo "<br>got trpagenr";
        $row1 = mysqli_fetch_array($result1);

        echo $cName = $row1['clothName'];
        echo $cDescription = $row1['clothDescription'];
        echo $cPrice = $row1['orderPrice'];
        echo $cFee = 200;
    } 
    else 
    {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }


    $sql2 = "SELECT * FROM shopperinfo WHERE shopperID = '$shopperID'";

    $result2 = mysqli_query($conn,$sql2);

    if (mysqli_query($conn, $sql2)) 
    {
        echo "<br>got trpagenr";
        $row2 = mysqli_fetch_array($result2);

        echo $sFname = $row2['shopperFname'];
        echo $sSname = $row2['shopperSname'];
        echo $sEmail = $row2['shopperEmail'];
        echo $sPhoneNumber = $row2['shopperPhonenumber'];
        echo $sLongitude = $row2['longitude'];
        echo $sLatitude = $row2['latitude'];

        //header('Location: ../html/shoppingCart.php');
    } 
    else 
    {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }

    //designer info
    $sql3 = "SELECT * FROM designerinfo WHERE designerID = '$designerID'";

    $result3 = mysqli_query($conn,$sql3);

    if (mysqli_query($conn, $sql3)) 
    {
        echo "<br>got designer";
        $row3 = mysqli_fetch_array($result3);

        echo $dFname = $row3['designerFname'];
        echo $dSname = $row3['designerSname'];
        echo $dEmail = $row3['designerEmail'];
        echo $dPhoneNumber = $row3['designerPhonenumber'];

    } 
    else 
    {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }


    $sql4 = "SELECT * FROM trpagentinfo WHERE trpAgentID = '$agentID'";

    $result4 = mysqli_query($conn,$sql4);

    if (mysqli_query($conn, $sql4)) 
    {
        echo "<br>got trpagenrending";
        $row4 = mysqli_fetch_array($result4);

        echo $tFname = $row4['trpAgentFname'];
        echo $tSname = $row4['trpAgentSname'];
        echo $tEmail = $row4['trpAgentEmail'];
        echo $tPhoneNumber = $row4['trpAgentPhonenumber'];
    } 
    else 
    {
        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
    }

    $sql5 = "INSERT INTO dispatch (orderID, clothName, trpfee, shopperID, trpAgentID) VALUES ('$orderID','$cName', '$cFee', '$shopperID', '$agentID')";

    if (mysqli_query($conn, $sql5)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
    }

   
}



$messageToShopper = "Dear $sFname $sSname,<br>This is to notify you that your Cloth order number: $orderID has been completed by $dFname $dSname and is awaiting shipping by $tFname $tSname. Upon receipt your Kindly required to log in to your account and confirm that the order was delivered successfully.<br>Kind Regards<br>Ivy Designs.";
$messageToAgent = "Dear $tFname $tSname,<br>This is to notify you that you have received a new deispatch order number: $orderID for $sFname $sSname. Upon delivery your Kindly required to log in to your account and confirm that the order was delivered successfully<br><br>You can contact him/her on $sPhoneNumber..<br>Kind Regards<br>Ivy Designs.";
$messageToDesigner = "Dear $dFname $dSname,This is to notify you that you order completion has been received and acknowledged. You payment is still pending but will be paid promptly upon the delivery of the cloth to the shopper. Kindly bear with us<br>Kind Regards<br>Ivy Designs." ;

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
    $mail->addAddress($tEmail);     // Add a recipient
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
    $mail->Subject = 'New Disaptch Order';
    $mail->Body    = $messageToAgent;
    $mail->AltBody = strip_tags($messageToAgent);

    if($mail->send())
    {
       echo 'Message has been sent';
       //header("location: ../html/designerOrders.php");
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
            $mail->addAddress($sEmail);     // Add a recipient
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
            $mail->Subject = 'Order Dispatch Started';
            $mail->Body    = $messageToShopper;
            $mail->AltBody = strip_tags($messageToShopper);

            if($mail->send())
            {
               echo 'Message has been sent';
               //header("location: ../html/designerOrders.php");
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
                    $mail->addAddress($dEmail);     // Add a recipient
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
                    $mail->Subject = 'Completion acknowledged';
                    $mail->Body    = $messageToDesigner;
                    $mail->AltBody = strip_tags($messageToDesigner);

                    if($mail->send())
                    {
                       echo 'Message has been sent';
                       //header("location: ../html/designerOrders.php"); 
                       echo '<script type="text/javascript">window.location = "../html/designerOrders.php"</script>';
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
    }
}
catch (Exception $e) 
{
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>