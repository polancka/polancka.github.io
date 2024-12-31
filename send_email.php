<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$env = parse_ini_file('.env');

if (!$env) {
    die('Could not read .env file');
}

$password = $env["PASSWORD"];
$my_email = $env["EMAIL"];

$name = $_POST["name"] ?? null;
$email = $_POST["email"] ?? null;
$message = $_POST["message"] ?? null;

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'mail.smtp2go.com'; 
$mail->SMTPAuth = true;
$mail->Username = $my_email; // Your Mailtrap username
$mail->Password = $password; // Your Mailtrap password
$mail->SMTPSecure = 'tls';
$mail->Port = 587; // Port used by Mailtrap
$mail->CharSet = 'UTF-8'; // Set email character set to UTF-8
$mail->Encoding = 'base64'; // Use base64 encoding to handle special characters


$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->setFrom('info@dialogo.si', $name);
$mail->addAddress('info@dialogo.si', 'Eva Polančec');

$mail->Subject="Naročanje preko spletne strani";
$mail->Body = "Ime: $name\nE-mail: $email\nSporočilo: $message";

if (!$mail->send()) {
    http_response_code(500); // Internal server error
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>