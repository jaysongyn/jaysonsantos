<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);


$mensagem 		= "Nome: $obj->nome\n\nE-mail: $obj->email\n\nMensagem: $obj->mensagem\n";

require 'class.phpmailer.php';
require 'class.smtp.php';

$mail = new PHPMailer;


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jayson.inf@gmail.com';                 // SMTP username
$mail->Password = '741**gamecube';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('jayson.inf@gmail.com', 'Jayson');
$mail->addAddress('jayson.inf@gmail.com', $obj->nome);     // Add a recipient

$mail->Subject = 'Contato do site jaysonsantos.me';
$mail->Body    = $mensagem;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    return false;
} else {
    return true;
}