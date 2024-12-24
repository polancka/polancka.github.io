<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once './vendor/autoload.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'mail.smtp2go.com'; // Typically this will be replaced with your Mailtrap SMTP server details when testing
$mail->SMTPAuth = true;
$mail->Username = 'dialogo.si'; // Your Mailtrap username
$mail->Password = 'oa23OXyl8dNSSLZU'; // Your Mailtrap password
$mail->SMTPSecure = 'tls';
$mail->Port = 587; // Port used by Mailtrap

$mail->setFrom('info@dialogo.si', 'First Last');
$mail->addAddress('info@dialogo.si', 'John Doe');

$mail->Body = 'Mail body in HTML';


if(!$mail->send()){
    echo 'Message could not be sent.' . PHP_EOL;
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent' . PHP_EOL;
}

// SMTP Debugging levels
$mail->SMTPDebug = 2; // Includes both client and server messages. Adjust as needed for your testing.