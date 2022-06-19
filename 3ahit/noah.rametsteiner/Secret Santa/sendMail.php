<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($email, $message, $subject, $name)
{

    $mail = new PHPMailer();

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'noah.rametsteiner@sz-ybbs.ac.at';

//Password to use for SMTP authentication
    $mail->Password = 'passwort'; //Not Included For Obvious Reason.

//Set who the message is to be sent from
    $mail->setFrom('noah.rametsteiner@sz-ybbs.ac.at', 'Noah Rametsteiner');

//Set an alternative reply-to address
    $mail->addReplyTo('noah.rametsteiner@sz-ybbs.ac.at', 'Noah Rametsteiner');

//Set who the message is to be sent to
    $mail->addAddress($email, $name);

//Set the subject line
    $mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    $mail->msgHTML($message);

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    } else {
        echo 'Message sent to'.$name.'!'.lf;
        return true;
    }
}
