<?php

$env = parse_ini_file('.env');
$password = $env["PASSWORD"];
$my_email = $env["EMAIL"];

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "mail.smtp2go.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 2525;

$mail->Username = $my_email;
$mail->Password = $password;

$mail->setFrom($email, $name);
$mail->addAddress("info@dialogo.si", "Eva");

$mail->Body = $message;

$mail->send();

header("Location: sent.html");