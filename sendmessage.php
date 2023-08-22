<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
define("PASSWORD","pvtblsitqgifjqgw");
define("EMAIL","gideonteibo@gmail.com");
ob_start();





if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];
    if(empty($email) || $email==""){
        $errormsg = "Email field is required";
       
    }
    elseif(empty($name) || $name==""){
        $errormsg = "Name field required";
       
    }
    elseif(empty($subject) || $subject==""){
    $errormsg = "Subject field required";
   
    }
    elseif(empty($message) || $message==""){
    $errormsg = "Message field required";
   
    }

 else {
    



$mail = new PHPMailer(true);
$mail->SMTPDebug = 3;   
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->isHTML(true);
$mail->Username = EMAIL;
$mail->Password = PASSWORD;
// $mail->SetFrom('simpletech.notify@gmail.com', 'notification');
$mail->Subject = 'Portfolio Message Alert';
$mail->Body = "'.$message.'";
$mail->AltBody = "This is the plain text version of the email content";
$mail->From = $email;
$mail->FromName = $name;
$mail->AddAddress("gideonteibo@gmail.com");
$mail->AddReplyTo($email);
try {
    $mail->send();
    echo "Your message has been sent";
    $successmsg = "Your message has been sent";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    $errormsg = "Sorry,failed to send your message";
}
 
 }
header("Location: portfolio.php#contactdiv?error=$errormsg&success=$successmsg");


}
 

ob_end_flush();
?>